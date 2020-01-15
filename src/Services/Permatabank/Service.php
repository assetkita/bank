<?php

namespace Assetku\BankService\Services\Permatabank;

use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Contracts\RtgsTransferSubject;
use Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OAuthException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\RtgsTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\BalanceInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OnlineTransferInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OverbookingInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\StatusTransactionInquiry;
use Assetku\BankService\Investa\Permatabank\AccountValidation\InquiryAccountValidation;
use Assetku\BankService\Investa\Permatabank\CheckRegistrationStatus\CheckRegistrationStatus;
use Assetku\BankService\Investa\Permatabank\Document\Document;
use Assetku\BankService\Investa\Permatabank\Registration;
use Assetku\BankService\Investa\Permatabank\RiskRating\InquiryRiskRating;
use Assetku\BankService\Investa\Permatabank\UpdateKycStatus\UpdateKycStatus;
use Assetku\BankService\Services\BankService;
use Assetku\BankService\Services\HttpClient;
use Assetku\BankService\Transfer\Permatabank\LlgTransfer;
use Assetku\BankService\Transfer\Permatabank\OnlineTransfer;
use Assetku\BankService\Transfer\Permatabank\Overbooking;
use Assetku\BankService\Transfer\Permatabank\RtgsTransfer;
use Assetku\BankService\utils\TrimWhitespace;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class Service implements BankService
{
    /**
     * permata bank api key
     *
     * @var string
     */
    protected $apiKey;

    /**
     * client id
     *
     * @var string
     */
    protected $clientId;

    /**
     * client secret
     *
     * @var string
     */
    protected $clientSecret;

    /**
     * permata bank timestamps
     *
     * @var string
     */
    protected $timestamp;

    /**
     * permata bank static key
     *
     * @var string
     */
    protected $staticKey;

    /**
     * API uri
     *
     * @var string
     */
    protected $uri;

    /**
     * organization name
     *
     * @var string
     */
    protected $organizationName;

    /**
     * @var string
     */
    protected $instcode;

    /**
     * @var HttpClient
     */
    protected $api;

    /**
     * @var TrimWhitespace
     */
    protected $trim;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * Service constructor.
     *
     * @throws GuzzleException
     * @throws OAuthException
     */
    public function __construct()
    {
        if (\App::environment('production')) {
            $this->uri = config('bankservice.services.permata.endpoint.production');
        } else {
            $this->uri = config('bankservice.services.permata.endpoint.development');
        }

        $this->initHttpClient();

        $this->timestamp = $this->generateTimestamp();

        $this->clientId = config('bankservice.services.permata.client_id');
        $this->clientSecret = config('bankservice.services.permata.client_secret');
        $this->apiKey = config('bankservice.services.permata.api_key');
        $this->staticKey = config('bankservice.services.permata.permata_static_key');
        $this->organizationName = config('bankservice.services.permata.permata_organization_name');
        $this->instcode = config('bankservice.services.permata.instcode');

        $this->trim = new TrimWhitespace;

        try {
            $this->accessToken = $this->getToken();
        } catch (OAuthException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function balanceInquiry(string $accountNumber)
    {
        $data = [
            'BalInqRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => random_alphanumeric(),
                ],
                'InqInfo'  => [
                    'AccountNumber' => $accountNumber,
                ],
            ],
        ];

        try {
            $response = $this->api->post('InquiryServices/BalanceInfo/inq', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new BalanceInquiry($contents);
            }

            // on unauthorized
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                throw BalanceInquiryException::unauthorized($contents->ErrorDescription);
            }

            // on forbidden
            if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                throw BalanceInquiryException::forbidden($contents->ErrorDescription);
            }

            // on internal server error
            if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                throw BalanceInquiryException::internalServerError();
            }

            // on service unavailable
            if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                throw BalanceInquiryException::serviceUnavailable();
            }

            // on unknown error
            throw BalanceInquiryException::unknownError();
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function overbookingInquiry(string $accountNumber)
    {
        $data = [
            'AcctInqRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => random_alphanumeric(),
                ],
                'InqInfo'  => [
                    'AccountNumber' => $accountNumber,
                ],
            ],
        ];

        try {
            $response = $this->api->post('InquiryServices/AccountInfo/inq', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new OverbookingInquiry($contents);
            }

            // on unauthorized
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                throw OverbookingInquiryException::unauthorized($contents->ErrorDescription);
            }

            // on forbidden
            if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                throw OverbookingInquiryException::forbidden($contents->ErrorDescription);
            }

            // on internal server error
            if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                throw OverbookingInquiryException::internalServerError();
            }

            // on service unavailable
            if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                throw OverbookingInquiryException::serviceUnavailable();
            }

            // on unknown error
            throw OverbookingInquiryException::unknownError();
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferInquiry(string $toAccount, string $bankId, string $bankName)
    {
        $data = [
            'OlXferInqRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => random_alphanumeric(),
                ],
                'XferInfo' => $this->trim
                    ->setToBeTrimmed('BankName')
                    ->setData([
                        'ToAccount' => $toAccount,
                        'BankId'    => $bankId,
                        'BankName'  => $bankName,
                    ])
                    ->handle(),
            ],
        ];

        try {
            $response = $this->api->post('InquiryServices/OnlineXferInfo/inq', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new OnlineTransferInquiry($contents);
            }

            // on unauthorized
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                throw OnlineTransferInquiryException::unauthorized($contents->ErrorDescription);
            }

            // on forbidden
            if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                throw OnlineTransferInquiryException::forbidden($contents->ErrorDescription);
            }

            // on internal server error
            if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                throw OnlineTransferInquiryException::internalServerError();
            }

            // on service unavailable
            if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                throw OnlineTransferInquiryException::serviceUnavailable();
            }

            // on unknown error
            throw OnlineTransferInquiryException::unknownError();
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function statusTransactionInquiry(string $customerReferenceId)
    {
        $data = [
            'StatusTransactionRq' => [
                'CorpID'    => $this->organizationName,
                'CustRefID' => $customerReferenceId,
            ],
        ];

        try {
            $response = $this->api->post('InquiryServices/StatusTransaction/Service/inq', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // on success
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new StatusTransactionInquiry($contents);
            }

            // on unauthorized
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                throw StatusTransactionInquiryException::unauthorized($contents->ErrorDescription);
            }

            // on forbidden
            if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                throw StatusTransactionInquiryException::forbidden($contents->ErrorDescription);
            }

            // on internal server error
            if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                throw StatusTransactionInquiryException::internalServerError();
            }

            // on service unavailable
            if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                throw StatusTransactionInquiryException::serviceUnavailable();
            }

            // on unknown error
            throw StatusTransactionInquiryException::unknownError();
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function overbooking(OverbookingSubject $subject)
    {
        try {
            $overbookingInquiry = $this->overbookingInquiry($subject->overbookingToAccount());
        } catch (OverbookingInquiryException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }

        if (! $overbookingInquiry->isSuccess()) {
            throw OverbookingInquiryException::invalid($subject->overbookingToAccount());
        }

        $data = [
            'XferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => random_alphanumeric(),
                ],
                'XferInfo' => $this->trim
                    ->setToBeTrimmed([
                        'FromAcctName',
                        'TrxDesc',
                        'BenefAcctName',
                        'BenefEmail',
                        'BenefPhoneNo',
                    ])
                    ->setData([
                        'FromAccount'   => $subject->overbookingFromAccount(),
                        'FromAcctName'  => $subject->overbookingFromAccountName(),
                        'ToAccount'     => $subject->overbookingToAccount(),
                        'Amount'        => $subject->overbookingAmount(),
                        'TrxDesc'       => $subject->overbookingTransactionDescription(),
                        'CurrencyCode'  => 'IDR',
                        'ChargeTo'      => '0',
                        'BenefAcctName' => $subject->overbookingFromAccountName(),
                    ])
                    ->handle(),
            ],
        ];

        try {
            $response = $this->api->post('BankingServices/FundsTransfer/add', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // on ok
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new Overbooking($contents);
            }

            // on unauthorized
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                throw OverbookingException::unauthorized($contents->ErrorDescription);
            }

            // on forbidden
            if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                throw OverbookingException::forbidden($contents->ErrorDescription);
            }

            // on internal server error
            if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                throw OverbookingException::internalServerError();
            }

            // on service unavailable
            if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                throw OverbookingException::serviceUnavailable();
            }

            throw OverbookingException::unknownError();
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function onlineTransfer(OnlineTransferSubject $subject)
    {
        try {
            $onlineTransferInquiry = $this->onlineTransferInquiry($subject->onlineTransferToAccount(),
                $subject->onlineTransferToBankId(), $subject->onlineTransferToBankName());
        } catch (OnlineTransferInquiryException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }

        if (! $onlineTransferInquiry->isSuccess()) {
            throw OnlineTransferInquiryException::invalid($subject->onlineTransferToAccount(),
                $subject->onlineTransferToBankId(), $subject->onlineTransferToBankName());
        }

        $data = [
            'OlXferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => random_alphanumeric(),
                ],
                'XferInfo' => $this->trim
                    ->setToBeTrimmed([
                        'FromAcctName',
                        'ToBankName',
                        'TrxDesc',
                        'BenefAcctName',
                        'BenefEmail',
                        'BenefPhoneNo',
                    ])
                    ->setData([
                        'FromAccount'   => $subject->onlineTransferFromAccount(),
                        'FromAcctName'  => $subject->onlineTransferFromAccountName(),
                        'ToAccount'     => $subject->onlineTransferToAccount(),
                        'ToBankId'      => $subject->onlineTransferToBankId(),
                        'ToBankName'    => $subject->onlineTransferToBankName(),
                        'Amount'        => $subject->onlineTransferAmount(),
                        'TrxDesc'       => $subject->onlineTransferTransactionDescription(),
                        'ChargeTo'      => '0',
                        'BenefAcctName' => $subject->onlineTransferBeneficiaryAccountName(),
                    ])
                    ->handle(),
            ]
        ];

        try {
            $response = $this->api->post('BankingServices/InterBankTransfer/add', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // on ok
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new OnlineTransfer($contents);
            }

            // on unauthorized
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                throw OnlineTransferException::unauthorized($contents->ErrorDescription);
            }

            // on forbidden
            if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                throw OnlineTransferException::forbidden($contents->ErrorDescription);
            }

            // on internal server error
            if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                throw OnlineTransferException::internalServerError();
            }

            // on service unavailable
            if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                throw OnlineTransferException::serviceUnavailable();
            }

            throw OnlineTransferException::unknownError();
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function llgTransfer(LlgTransferSubject $subject)
    {
        $data = [
            'LlgXferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => random_alphanumeric(),
                ],
                'XferInfo' => $this->trim
                    ->setToBeTrimmed([
                        'FromAcctName',
                        'ToBankName',
                        'TrxDesc',
                        'BenefAcctName',
                        'BenefBankAddress',
                        'BenefBankBranchName',
                        'BenefBankCity',
                    ])
                    ->setData([
                        'FromAccount'         => $subject->llgTransferFromAccount(),
                        'FromAcctName'        => $subject->llgTransferFromAccountName(),
                        'ToAccount'           => $subject->llgTransferToAccount(),
                        'ToBankId'            => $subject->llgTransferToBankId(),
                        'ToBankName'          => $subject->llgTransferToBankName(),
                        'Amount'              => $subject->llgTransferAmount(),
                        'TrxDesc'             => $subject->llgTransferTransactionDescription(),
                        'ChargeTo'            => '0',
                        'CitizenStatus'       => '0',
                        'ResidentStatus'      => '0',
                        'BenefType'           => '1',
                        'BenefAcctName'       => $subject->llgTransferBeneficiaryAccountName(),
                        'BenefBankAddress'    => $subject->llgTransferBeneficiaryBankAddress(),
                        'BenefBankBranchName' => $subject->llgTransferBeneficiaryBankBranchName(),
                        'BenefBankCity'       => $subject->llgTransferBeneficiaryBankCity(),
                    ])
                    ->handle(),
            ]
        ];

        try {
            $response = $this->api->post('BankingServices/LlgTransfer/add', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // on ok
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new LlgTransfer($contents);
            }

            // on unauthorized
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                throw LlgTransferException::unauthorized($contents->ErrorDescription);
            }

            // on forbidden
            if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                throw LlgTransferException::forbidden($contents->ErrorDescription);
            }

            // on internal server error
            if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                throw LlgTransferException::internalServerError();
            }

            // on service unavailable
            if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                throw LlgTransferException::serviceUnavailable();
            }

            throw LlgTransferException::unknownError();
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransfer(RtgsTransferSubject $subject)
    {
        $data = [
            'RtgsXferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => random_alphanumeric(),
                ],
                'XferInfo' => $this->trim->setToBeTrimmed([
                    'FromAccount',
                    'FromAcctName',
                    'ToAccount',
                    'ToBankName',
                    'TrxDesc',
                    'BenefAcctName',
                    'BenefBankAddress',
                    'BenefBankBranchName',
                    'BenefBankCity',
                ])
                    ->setData([
                        'FromAccount'         => $subject->rtgsTransferFromAccount(),
                        'FromAcctName'        => $subject->rtgsTransferFromAccountName(),
                        'ToAccount'           => $subject->rtgsTransferToAccount(),
                        'ToBankId'            => $subject->rtgsTransferToBankId(),
                        'ToBankName'          => $subject->rtgsTransferToBankName(),
                        'Amount'              => $subject->rtgsTransferAmount(),
                        'TrxDesc'             => $subject->rtgsTransferTransactionDescription(),
                        'ChargeTo'            => '0',
                        'CitizenStatus'       => '0',
                        'ResidentStatus'      => '0',
                        'BenefType'           => '1',
                        'BenefAcctName'       => $subject->rtgsTransferBeneficiaryAccountName(),
                        'BenefBankAddress'    => $subject->rtgsTransferBeneficiaryBankAddress(),
                        'BenefBankBranchName' => $subject->rtgsTransferBeneficiaryBankBranchName(),
                        'BenefBankCity'       => $subject->rtgsTransferBeneficiaryBankCity(),
                    ])
                    ->handle(),
            ]
        ];

        try {
            $response = $this->api->post('BankingServices/RtgsTransfer/add', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // on ok
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new RtgsTransfer($contents);
            }

            // on unauthorized
            if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                throw RtgsTransferException::unauthorized($contents->ErrorDescription);
            }

            // on forbidden
            if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                throw RtgsTransferException::forbidden($contents->ErrorDescription);
            }

            // on internal server error
            if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                throw RtgsTransferException::internalServerError();
            }

            // on service unavailable
            if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                throw RtgsTransferException::serviceUnavailable();
            }

            throw RtgsTransferException::unknownError();
        } catch (GuzzleException $e) {
            throw $e;
        }

    }

    /**
     * Submit Fintech Account Request
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     */
    public function submitFintechAccount(array $data, string $custRefID)
    {
        $data = [
            'SubmitApplicationRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $custRefID
                ],
                'ApplicationInfo' => $data
            ]
        ];

        try {
            $response = $this->api->post('appldata_v2/add', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new Registration($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Submit document registration
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     */
    public function submitRegistrationDocument(array $data, string $custRefID)
    {
        $data = [
            'SubmitDocumentRq' => [
                'MsgRqHdr'     => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $custRefID
                ],
                'DocumentInfo' => $data
            ]
        ];

        try {
            $response = $this->api->post('appldoc/add', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new Document($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Inquiry application status
     *
     * @param  string  $reffCode
     * @param  string  $custRefID
     * @return mixed
     */
    public function inquiryApplicationStatus(string $reffCode, string $custRefID)
    {
        $data = [
            'InquiryApplicationRq' => [
                'MsgRqHdr'              => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $custRefID
                ],
                'SubmitApplicationInfo' => [
                    'ReffCode' => $reffCode
                ]
            ]
        ];

        try {
            $response = $this->api->post('appldata_v2/inq', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new CheckRegistrationStatus($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function inquiryRiskRating(array $data, string $custRefID)
    {
        $data = [
            'InquiryHighRiskRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $custRefID
                ],
                'ApplicationInfo' => $data
            ]
        ];

        try {
            $response = $this->api->post('appldata_v2/riskrating/inq', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            // if status code 200 or success
            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new InquiryRiskRating($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function inquiryAccountValidation(array $data, string $custRefID)
    {
        $data = [
            'InquiryAccountValidationRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $custRefID
                ],
                'ApplicationInfo' => $data
            ]
        ];

        try {
            $response = $this->api->post('appldata_v2/acctvalidation/inq', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new InquiryAccountValidation($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }

    }

    public function updateKycStatus(array $data, string $custRefID)
    {
        $data = [
            'UpdateKycFlagRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $custRefID,
                ],
                'ApplicationInfo' => $data
            ]
        ];

        try {
            $response = $this->api->post('appldata_v2/kycstatus/add', $data, $this->header($data));

            $contents = json_decode($response->getBody()->getContents());

            if ($response->getStatusCode() === Response::HTTP_OK) {
                return new updateKycStatus($contents);
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Get permata bank access token
     *
     * @return string
     * @throws GuzzleException
     * @throws OAuthException
     */
    protected function getToken()
    {
        try {
            // remember the access token in cache for 150 minutes (2.5 hours)
            return Cache::remember('permatabank.access_token', 150, function () {
                $message = "{$this->apiKey}:{$this->timestamp}:grant_type=client_credentials";

                $headers = [
                    'OAUTH-Signature' => $this->generateSignature($message, $this->staticKey),
                    'OAUTH-Timestamp' => $this->timestamp,
                    'API-Key'         => $this->apiKey,
                    'Authorization'   => "Basic {$this->generateAuthorizationKey($this->clientId, $this->clientSecret)}",
                ];

                $data = [
                    'grant_type' => 'client_credentials',
                ];

                try {
                    $response = $this->api->post('oauth/token', $data, $headers, HttpClient::FORM_PARAMS);

                    $contents = json_decode($response->getBody()->getContents());

                    // on success
                    if ($response->getStatusCode() === Response::HTTP_OK) {
                        return $contents->access_token;
                    }

                    // on unauthorized
                    if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
                        throw OAuthException::forbidden($contents->ErrorDescription);
                    }

                    // on forbidden
                    if ($response->getStatusCode() === Response::HTTP_FORBIDDEN) {
                        throw OAuthException::forbidden($contents->ErrorDescription);
                    }

                    // on internal server error
                    if ($response->getStatusCode() === Response::HTTP_INTERNAL_SERVER_ERROR) {
                        throw OAuthException::internalServerError();
                    }

                    // on service unavailable
                    if ($response->getStatusCode() === Response::HTTP_SERVICE_UNAVAILABLE) {
                        throw OAuthException::serviceUnavailable();
                    }

                    // on unknown error
                    throw OAuthException::unknownError();
                } catch (GuzzleException $e) {
                    throw $e;
                }
            });
        } catch (OAuthException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Generate the timestamp required for request headers
     *
     * @return string timestamp
     */
    protected function generateTimestamp()
    {
        return date('o-m-d').'T'.date('H:i:s').'.'.substr(date('u'), 0, 3).date('P');
    }

    /**
     * Generate authorization key
     *
     * @param  string  $clientId
     * @param  string  $clientSecret
     * @return string
     */
    protected function generateAuthorizationKey(string $clientId, string $clientSecret)
    {
        return base64_encode("{$clientId}:{$clientSecret}");
    }

    /**
     * Initialize http client
     *
     * @param  array  $headers
     * @return HttpClient
     */
    protected function initHttpClient($headers = [])
    {
        return $this->api = new HttpClient([
            'base_uri' => $this->uri,
            'headers'  => $headers,
        ]);
    }

    /**
     * Build header for permata bank API request
     *
     * @param  array  $data
     * @return array
     */
    protected function header(array $data)
    {
        $payload = json_encode($data, JSON_UNESCAPED_SLASHES);

        $message = "{$this->accessToken}:{$this->timestamp}:{$payload}";

        return [
            'Authorization'     => "Bearer {$this->accessToken}",
            'permata-signature' => $this->generateSignature($message, $this->staticKey),
            'organizationname'  => $this->organizationName,
            'permata-timestamp' => $this->timestamp,
        ];
    }

    /**
     * Generate signature code required for request header
     *
     * @param  string  $message
     * @param  string  $staticKey
     * @return string
     */
    protected function generateSignature($message, string $staticKey)
    {
        return base64_encode(hash_hmac('sha256', $message, $staticKey, true));
    }
}
