<?php

namespace Assetku\BankService\Services\Permatabank;

use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\OverbookingInquiryException;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\BalanceInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OnlineTransferInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OverbookingInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\StatusTransactionInquiry;
use Assetku\BankService\Requests\Contracts\AccessTokenRequest;
use Assetku\BankService\Requests\Contracts\BalanceInquiryRequest;
use Assetku\BankService\Requests\Contracts\Factories\OnlineTransferInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OverbookingInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\LlgTransferRequest;
use Assetku\BankService\Requests\Contracts\OnlineTransferInquiryRequest;
use Assetku\BankService\Requests\Contracts\OnlineTransferRequest;
use Assetku\BankService\Requests\Contracts\OverbookingInquiryRequest;
use Assetku\BankService\Requests\Contracts\OverbookingRequest;
use Assetku\BankService\Requests\Contracts\RtgsTransferRequest;
use Assetku\BankService\Requests\Contracts\StatusTransactionInquiryRequest;
use Assetku\BankService\Services\Contracts\Api;
use Assetku\BankService\Services\Contracts\Service as ServiceContract;
use Assetku\BankService\Transfer\Permatabank\LlgTransfer;
use Assetku\BankService\Transfer\Permatabank\OnlineTransfer;
use Assetku\BankService\Transfer\Permatabank\Overbooking;
use Assetku\BankService\Transfer\Permatabank\RtgsTransfer;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Service implements ServiceContract
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * Service constructor.
     */
    public function __construct()
    {
        $environment = \App::environment('production') ? 'production' : 'development';

        $this->api = \App::make(Api::class, [
            'base_uri' => \Config::get("bank.providers.permatabank.{$environment}.base_url")
        ]);
    }

    /**
     * @inheritDoc
     */
    public function accessToken(AccessTokenRequest $request)
    {
        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($statusCode, $contents);
            }

            $data = json_decode($contents);

            return $data->access_token;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function balanceInquiry(BalanceInquiryRequest $request)
    {
        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($contents, $statusCode);
            }

            $data = json_decode($contents);

            return new BalanceInquiry($data);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function overbookingInquiry(OverbookingInquiryRequest $request)
    {
        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($contents, $statusCode);
            }

            $data = json_decode($contents);

            return new OverbookingInquiry($data);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferInquiry(OnlineTransferInquiryRequest $request)
    {
        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($contents, $statusCode);
            }

            $data = json_decode($contents);

            return new OnlineTransferInquiry($data);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function statusTransactionInquiry(StatusTransactionInquiryRequest $request)
    {
        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($contents, $statusCode);
            }

            $data = json_decode($contents);

            return new StatusTransactionInquiry($data);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function overbooking(OverbookingRequest $request)
    {
        try {
            $overbookingInquiryRequest = \App::make(OverbookingInquiryRequestFactory::class)->make($request->toAccount());

            $overbookingInquiry = $this->overbookingInquiry($overbookingInquiryRequest);

            if (! $overbookingInquiry->isSuccess()) {
                $meta = $overbookingInquiry->getMeta();

                throw new OverbookingInquiryException($meta->getErrorMessage(), $meta->getStatusCode());
            }
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }

        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($contents, $statusCode);
            }

            $data = json_decode($contents);

            return new Overbooking($data);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function onlineTransfer(OnlineTransferRequest $request)
    {
        try {
            $onlineTransferInquiryRequest = \App::make(OnlineTransferInquiryRequestFactory::class)
                ->make($request->toAccount(), $request->toBankId(), $request->toBankName());

            $onlineTransferInquiry = $this->onlineTransferInquiry($onlineTransferInquiryRequest);

            if (! $onlineTransferInquiry->isSuccess()) {
                $meta = $onlineTransferInquiry->getMeta();

                throw new OnlineTransferInquiryException($meta->getErrorMessage(), $meta->getStatusCode());
            }
        } catch (OnlineTransferInquiryException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }

        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($contents, $statusCode);
            }

            $data = json_decode($contents);

            return new OnlineTransfer($data);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function llgTransfer(LlgTransferRequest $request)
    {
        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($contents, $statusCode);
            }

            $data = json_decode($contents);

            return new LlgTransfer($data);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransfer(RtgsTransferRequest $request)
    {
        try {
            $response = $this->api->handle($request);

            $statusCode = $response->getStatusCode();

            $contents = $response->getBody()->getContents();

            if ($statusCode !== Response::HTTP_OK) {
                throw new HttpException($contents, $statusCode);
            }

            $data = json_decode($contents);

            return new RtgsTransfer($data);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function submitFintechAccount(array $data, string $custRefID)
    {
        /*$data = [
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
        }*/
    }

    /**
     * @inheritDoc
     */
    public function submitRegistrationDocument(array $data, string $custRefID)
    {
        /*$data = [
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
        }*/
    }

    /**
     * @inheritDoc
     */
    public function inquiryApplicationStatus(string $reffCode, string $custRefID)
    {
        /*$data = [
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
        }*/
    }

    /**
     * @inheritDoc
     */
    public function inquiryRiskRating(array $data, string $custRefID)
    {
        /*$data = [
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
        }*/
    }

    /**
     * @inheritDoc
     */
    public function inquiryAccountValidation(array $data, string $custRefID)
    {
        /*$data = [
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
        }*/
    }

    /**
     * @inheritDoc
     */
    public function updateKycStatus(array $data, string $custRefID)
    {
        /*$data = [
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
        }*/
    }
}
