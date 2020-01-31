<?php

namespace Assetku\BankService\Services;

use Assetku\BankService\Contracts\Apis\Api;
use Assetku\BankService\Contracts\Apis\Factory;
use Assetku\BankService\Contracts\Inquiries\BalanceInquiry;
use Assetku\BankService\Contracts\Inquiries\BalanceInquiryFactory;
use Assetku\BankService\Contracts\Inquiries\OnlineTransferInquiryFactory;
use Assetku\BankService\Contracts\Inquiries\OverbookingInquiryFactory;
use Assetku\BankService\Contracts\Inquiries\StatusTransactionInquiryFactory;
use Assetku\BankService\Contracts\Transfers\LlgTransferFactory;
use Assetku\BankService\Contracts\Transfers\OnlineTransferFactory;
use Assetku\BankService\Contracts\Transfers\OverbookingFactory;
use Assetku\BankService\Contracts\Transfers\RtgsTransferFactory;
use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\OverbookingInquiryException;
use Assetku\BankService\Contracts\Requests\AccessTokenRequest;
use Assetku\BankService\Contracts\Requests\BalanceInquiryRequest;
use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequestFactory;
use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequestFactory;
use Assetku\BankService\Contracts\Requests\LlgTransferRequest;
use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequest;
use Assetku\BankService\Contracts\Requests\OnlineTransferRequest;
use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequest;
use Assetku\BankService\Contracts\Requests\OverbookingRequest;
use Assetku\BankService\Contracts\Requests\RtgsTransferRequest;
use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequest;
use Assetku\BankService\Services\Contracts\Service as ServiceContract;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PermatabankService implements ServiceContract
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * PermatabankService constructor.
     */
    public function __construct()
    {
        $environment = \App::environment('production') ? 'production' : 'development';

        $this->api = \App::make(Factory::class)
            ->make(\Config::get("bank.providers.permatabank.{$environment}.base_url"));
    }

    /**
     * @inheritDoc
     */
    public function accessToken(AccessTokenRequest $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            $data = json_decode($contents, true);

            return $data['access_token'];
        } catch (HttpException $e) {
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

            $contents = $response->getBody()->getContents();

            return \App::make(BalanceInquiryFactory::class)->make($request, $contents);
        } catch (HttpException $e) {
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

            $contents = $response->getBody()->getContents();

            return \App::make(OverbookingInquiryFactory::class)->make($request, $contents);
        } catch (HttpException $e) {
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

            $contents = $response->getBody()->getContents();

            return \App::make(OnlineTransferInquiryFactory::class)->make($request, $contents);
        } catch (HttpException $e) {
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

            $contents = $response->getBody()->getContents();

            return \App::make(StatusTransactionInquiryFactory::class)->make($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function overbooking(OverbookingRequest $request)
    {
        try {
            $overbookingInquiryRequest = \App::make(OverbookingInquiryRequestFactory::class)
                ->make($request->toAccount());

            $overbookingInquiry = $this->overbookingInquiry($overbookingInquiryRequest);

            if (! $overbookingInquiry->isSuccess()) {
                throw new OverbookingInquiryException($overbookingInquiry->error(), $overbookingInquiry->statusCode());
            }
        } catch (HttpException $e) {
            throw $e;
        }

        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(OverbookingFactory::class)->make($request, $contents);
        } catch (HttpException $e) {
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
                throw new OnlineTransferInquiryException($onlineTransferInquiry->error(), $onlineTransferInquiry->statusCode());
            }
        } catch (HttpException $e) {
            throw $e;
        }

        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(OnlineTransferFactory::class)->make($request, $contents);
        } catch (HttpException $e) {
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

            $contents = $response->getBody()->getContents();

            return \App::make(LlgTransferFactory::class)->make($request, $contents);
        } catch (HttpException $e) {
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

            $contents = $response->getBody()->getContents();

            return \App::make(RtgsTransferFactory::class)->make($request, $contents);
        } catch (HttpException $e) {
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

            if ($response->statusCode() === Response::HTTP_OK) {
                return new Registration($contents);
            }
        } catch (HttpException $e) {
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

            if ($response->statusCode() === Response::HTTP_OK) {
                return new Document($contents);
            }
        } catch (HttpException $e) {
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

            if ($response->statusCode() === Response::HTTP_OK) {
                return new CheckRegistrationStatus($contents);
            }
        } catch (HttpException $e) {
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
            if ($response->statusCode() === Response::HTTP_OK) {
                return new InquiryRiskRating($contents);
            }
        } catch (HttpException $e) {
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

            if ($response->statusCode() === Response::HTTP_OK) {
                return new InquiryAccountValidation($contents);
            }
        } catch (HttpException $e) {
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

            if ($response->statusCode() === Response::HTTP_OK) {
                return new updateKycStatus($contents);
            }
        } catch (HttpException $e) {
            throw $e;
        }*/
    }
}
