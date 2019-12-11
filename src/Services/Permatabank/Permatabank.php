<?php

namespace Assetku\BankService\Services\Permatabank;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\GuzzleException;
use Assetku\BankService\Services\HttpClient;
use Assetku\BankService\utils\TrimWhiteSpace;
use Assetku\BankService\Contracts\BankContract;
use Assetku\BankService\Overbooking\Overbooking;
use Assetku\BankService\Overbooking\InquiryOverbooking;
use Assetku\BankService\Transfer\LlgTransfer\LlgTransfer;
use Assetku\BankService\Transaction\InquiryStatusTransaction;
use Assetku\BankService\Transfer\OnlineTransfer\OnlineTransfer;
use Assetku\BankService\Transfer\OnlineTransfer\InquiryOnlineTransfer;
use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingExceptions;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\InquiryOverbookingException;
use Assetku\BankService\Exceptions\PermatabankExceptions\InquiryOnlineTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\InquiryStatusTransactionException;
use Assetku\BankService\Investa\Permatabank\Document\Document;
use Assetku\BankService\Investa\Permatabank\Registration;
use Assetku\BankService\Investa\Permatabank\CheckRegistrationStatus\CheckRegistrationStatus;
use Assetku\BankService\Investa\Permatabank\RiskRating\InquiryRiskRating;
use Assetku\BankService\Investa\Permatabank\AccountValidation\InquiryAccountValidation;

class Permatabank implements BankContract
{
    /**
     * permata bank api key
     *
     * @var string
     */
    private $apiKey;

    /**
     * client id
     *
     * @var string $clientId
     */
    private $clientId;

    /**
     * client secret
     *
     * @var string $clienSecret
     */
    private $clienSecret;

    /**
     * Permatabank timestamps
     *
     * @var string $timesTamp
     */
    protected $timesTamp;

    /**
     * Permatabank static key
     *
     * @var string $staticKey
     */
    private $staticKey;

    /**
     * API uri
     *
     * @var string $uri
     */
    protected $uri;

    /**
     * access token
     *
     * @var string $access_token
     */
    private $accessToken = null;

    /**
     * organization name
     *
     * @var string $organizationName
     */
    private $organizationName;

    /**
     * @var string $instcode
     */
    private $instcode;

    /**
     * @var $api
     */
    protected $api;

    /**
     * @var $trim
     */
    protected $trim;

    public function __construct()
    {
        if (\App::environment('production')) {
            $this->uri = config('bankservice.services.permata.endpoint.production');
        } else {
            $this->uri = config('bankservice.services.permata.endpoint.development');
        }

        $this->initHttpClient();

        $this->timesTamp = $this->generateTimesTamp();

        $this->clientId = config('bankservice.services.permata.client_id');
        $this->clienSecret = config('bankservice.services.permata.client_secret');
        $this->apiKey = config('bankservice.services.permata.api_key');
        $this->staticKey = config('bankservice.services.permata.permata_static_key');
        $this->organizationName = config('bankservice.services.permata.permata_organization_name');
        $this->instcode = config('bankservice.services.permata.instcode');

        $this->trim = new TrimWhiteSpace;

        $this->accessToken = $this->getToken();
    }

    /**
     * Oauth token request
     *
     * @return GuzzleHttp\Psr7\Response
     */
    public function getToken()
    {
        $message = "{$this->apiKey}:{$this->timesTamp}:grant_type=client_credentials";
        
        $headers = [
            'OAUTH-Signature' => $this->generateSignature($message, $this->staticKey),
            'OAUTH-Timestamp' => $this->timesTamp,
            'API-Key' => $this->apiKey,
            'Authorization' => 'Basic ' . $this->generateAuthorizationKey($this->clientId, $this->clienSecret),
        ];

        $data = ['grant_type' => 'client_credentials'];

        try {
            $response = $this->api->postToken('oauth/token', $data, $headers);
            return $this->parse($response)['access_token'];
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * overbooking request
     * 
     * @param array $data
     * @param string $custRefID
     * @return GuzzleHttp\Psr7\Response
     */
    public function overbooking(array $data, string $custRefID)
    {
        $payload = [
            'XferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'XferInfo' => $data
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:$encodeData";

        $headers = [
            'Authorization' => "Bearer " . $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('BankingServices/FundsTransfer/add', $payload, $headers);
            
            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === 200) {
                return new Overbooking($contents);
            }

            // on signature not valid error
            if ($response->getStatusCode() === 403) {
                throw OverbookingExceptions::forbidden($contents->ErrorDescritpion);
            }

            // on unauthorized request
            if ($response->getStatusCode() === 401) {
                throw OverbookingExceptions::unauthorize($contents->ErrorDescritpion);
            }

        } catch (GuzzleException $e) {
            throw $e;  
        }
    }

    /**
     * Inquiry overbooking request
     * 
     * @param string $custRefID
     * @param string $accountNumber
     * @return GuzzleHttp\Psr7\Response
     */
    public function inquiryOverbooking(string $accountNumber, string $custRefID)
    {
        $payload = [
            'AcctInqRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'InqInfo' => [
                    'AccountNumber' => $accountNumber
                ]
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer ". $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('InquiryServices/AccountInfo/inq', $payload, $headers);
            
            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === 200) {
                return new InquiryOverbooking($contents);
            }

            // on signature not valid error
            if ($response->getStatusCode() === 403) {
                throw InquiryOverbookingExceptions::forbidden($contents->ErrorDescritpion);
            }

            // on unauthorized request
            if ($response->getStatusCode() === 401) {
                throw InquiryOverbookingExceptions::unauthorize($contents->ErrorDescritpion);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Inquiry Online Transfer Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function onlineTransferInquiry(array $data, string $custRefID)
    {
        $payload = [
            'OlXferInqRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'XferInfo' => $data
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer " . $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('InquiryServices/OnlineXferInfo/inq', $payload, $headers);
            
            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === 200) {
                return new InquiryOnlineTransfer($contents);
            }

            // on signature not valid error
            if ($response->getStatusCode() === 403) {
                throw InquiryOnlineTransferExceptions::forbidden($contents->ErrorDescritpion);
            }

            // on unauthorized request
            if ($response->getStatusCode() === 401) {
                throw InquiryOnlineTransferExceptions::unauthorize($contents->ErrorDescritpion);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Online Transfer Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function onlineTransfer(array $data, string $custRefID)
    {
        $payload = [
            'OlXferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'XferInfo' => $data
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer " . $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('BankingServices/InterBankTransfer/add', $payload, $headers);
            
            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === 200) {
                return new OnlineTransfer($contents);
            }

            // on signature not valid error
            if ($response->getStatusCode() === 403) {
                throw OnlineTransferExceptions::forbidden($contents->ErrorDescritpion);
            }

            // on unauthorized request
            if ($response->getStatusCode() === 401) {
                throw OnlineTransferExceptions::unauthorize($contents->ErrorDescritpion);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * LLG Transfer Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function llgTransfer(array $data, string $custRefID)
    {
        $payload = [
            'LlgXferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'XferInfo' => $data
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);
        
        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";
        
        $headers = [
            'Authorization' => "Bearer " . $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('BankingServices/LlgTransfer/add', $payload, $headers);
            
            $contents = json_decode($response->getBody()->getContents());
            
            if ($response->getStatusCode() === 200) {
                return new LlgTransfer($contents);
            }

            // on signature not valid error
            if ($response->getStatusCode() === 403) {
                throw LlgTransferException::forbidden($contents->ErrorDescritpion);
            }

            // on unauthorized request
            if ($response->getStatusCode() === 401) {
                throw LlgTransferException::unauthorize($contents->ErrorDescritpion);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Submit Fintech Account Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function submitFintechAccount(array $data, string $custRefID)
    {
        $payload = [
            'SubmitApplicationRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'ApplicationInfo' => $data
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer ". $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('appldata_v2/add', $payload, $headers);

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === 200) {
                return new Registration($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Submit document registration
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function submitRegistrationDocument(array $data, string $custRefID)
    {
        $payload = [
            'SubmitDocumentRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'DocumentInfo' => $data
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer ". $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('appldoc/add', $payload, $headers);

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === 200) {
                return new Document($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Inquiry application status
     *
     * @param string $reffCode
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryApplicationStatus(string $reffCode, string $custRefID)
    {
        $payload = [
            'InquiryApplicationRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'SubmitApplicationInfo' => [
                    'ReffCode' => $reffCode
                ]
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer ". $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('appldata_v2/inq', $payload, $headers);

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === 200) {
                return new CheckRegistrationStatus($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function inquiryRiskRating(array $data, string $custRefID)
    {
        $payload = [
            'InquiryHighRiskRq'=> [
                'MsgRqHdr'=> [
                    'RequestTimestamp'=> $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'ApplicationInfo' => $data
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer ". $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('appldata_v2/riskrating/inq', $payload, $headers);

            $contents = json_decode($response->getBody()->getContents());

            // if status code 200 or success
            if ($response->getStatusCode() === 200) {
                return new InquiryRiskRating($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function inquiryAccountValidation(array $data, string $custRefID)
    {
        $payload = [
            'InquiryAccountValidationRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID
                ],
                'ApplicationInfo' => $data
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer ". $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('appldata_v2/acctvalidation/inq', $payload, $headers);

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === 200) {
                return new InquiryAccountValidation($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }

    }

    public function updateKycStatus(array $data, string $custRefID)
    {
        $payload = [
            'UpdateKycFlagRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timesTamp,
                    'CustRefID' => $custRefID,
                ],
                'ApplicationInfo' => $data
            ]
        ];
        
        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";

        $headers = [
            'Authorization' => "Bearer ". $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('appldata_v2/kycstatus/add', $payload, $headers);

            $contents = json_encode($response->getBody()->getContents());

            return $contents;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
    
    /**
     * Inquiry status transaction
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryStatusTransaction(string $custRefID)
    {
        $payload = [
            'StatusTransactionRq' => [
                'CorpID' => $this->organizationName,
                'CustRefID' => $custRefID
            ]
        ];

        $encodeData = json_encode($payload, JSON_UNESCAPED_SLASHES);
        
        $message = "{$this->accessToken}:{$this->timesTamp}:{$encodeData}";
        
        $headers = [
            'Authorization' => "Bearer " . $this->accessToken,
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname' => $this->organizationName,
            'permata-timestamp' => $this->timesTamp,
        ];

        try {
            $response = $this->api->post('InquiryServices/StatusTransaction/Service/inq', $payload, $headers);
            
            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === 200) {
                return new InquiryStatusTransaction($contents);
            }

            // on signature not valid error
            if ($response->getStatusCode() === 403) {
                throw InquiryStatusTransactionExceptions::forbidden($contents->ErrorDescritpion);
            }

            // on unauthorized request
            if ($response->getStatusCode() === 401) {
                throw InquiryStatusTransactionExceptions::unauthorize($contents->ErrorDescritpion);
            }

        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * generate signature code required for request header
     *
     * @param string $message
     * @param string $staticKey
     */
    protected function generateSignature($message, $staticKey)
    {
        $hash = hash_hmac('sha256', $message, $staticKey, true);

        $signature = base64_encode($hash);

        return $signature;
    }

    /**
     * Parse the json response from requested API
     *
     * @param GuzzleHttp\Psr7\Response
     */
    protected function parse(Response $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Generate the timestamp required for request headers
     *
     * @return string timestamp
     */
    protected function generateTimesTamp()
    {
        return date('o-m-d') . 'T' . date('H:i:s') . '.' . substr(date('u'), 0, 3) . date('P');
    }

    /**
     * generate and encode the authorization key
     *
     * @param string $clientId
     * @param string $clienSecret
     */
    protected function generateAuthorizationKey($clientId, $clienSecret)
    {
        return base64_encode("$clientId:$clienSecret");
    }

    protected function initHttpClient($headers = [])
    {
        return $this->api = new HttpClient([
            'base_uri' => $this->uri,
            'headers' => $headers
        ]);
    }
}
