<?php

namespace Assetku\BankService\Services;

use Assetku\BankService\Contracts\AccessToken\AccessTokenRequestContract;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryFactoryContract;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryRequestContract;
use Assetku\BankService\Contracts\Apis\ApiInterface;
use Assetku\BankService\Contracts\Apis\ApiFactoryInterface;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryFactoryContract;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryRequestContract;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryFactoryContract;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryRequestContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferFactoryContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferRequestContract;
use Assetku\BankService\Contracts\NotifAccountOpeningStatus\NotifAccountOpeningStatusHandlerInterface;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferFactoryContract;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferRequestContract;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryFactoryContract;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryRequestContract;
use Assetku\BankService\Contracts\Overbooking\OverbookingFactoryContract;
use Assetku\BankService\Contracts\Overbooking\OverbookingRequestContract;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryFactoryContract;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryRequestContract;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryFactoryContract;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryRequestContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferFactoryContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferRequestContract;
use Assetku\BankService\Contracts\ServiceInterface;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryFactoryContract;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentRequestContract;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusFactoryContract;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusRequestContract;
use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\OverbookingInquiryException;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PermatabankService implements ServiceInterface
{
    /**
     * @var ApiInterface
     */
    protected $api;

    /**
     * PermatabankService constructor.
     */
    public function __construct()
    {
        $environment = \App::environment('production') ? 'production' : 'development';

        $this->api = \App::make(ApiFactoryInterface::class)
            ->make(\Config::get("bank.providers.permatabank.{$environment}.base_url"));
    }

    /**
     * @inheritDoc
     */
    public function accessToken(AccessTokenRequestContract $request)
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
    public function balanceInquiry(BalanceInquiryRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(BalanceInquiryFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function overbookingInquiry(OverbookingInquiryRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(OverbookingInquiryFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferInquiry(OnlineTransferInquiryRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(OnlineTransferInquiryFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function statusTransactionInquiry(StatusTransactionInquiryRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(StatusTransactionInquiryFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function overbooking(OverbookingRequestContract $request)
    {
        try {
            $overbookingInquiryRequest = \App::make(OverbookingInquiryFactoryContract::class)
                ->makeRequest($request->toAccount());

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

            return \App::make(OverbookingFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function onlineTransfer(OnlineTransferRequestContract $request)
    {
        try {
            $onlineTransferInquiryRequest = \App::make(OnlineTransferInquiryFactoryContract::class)
                ->makeRequest($request->toAccount(), $request->toBankId(), $request->toBankName());

            $onlineTransferInquiry = $this->onlineTransferInquiry($onlineTransferInquiryRequest);

            if (! $onlineTransferInquiry->isSuccess()) {
                throw new OnlineTransferInquiryException($onlineTransferInquiry->error(),
                    $onlineTransferInquiry->statusCode());
            }
        } catch (HttpException $e) {
            throw $e;
        }

        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(OnlineTransferFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function llgTransfer(LlgTransferRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(LlgTransferFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransfer(RtgsTransferRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(RtgsTransferFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function submitApplicationData(SubmitApplicationDataRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(SubmitApplicationDataFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function submitApplicationDocument(SubmitApplicationDocumentRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(SubmitApplicationDocumentFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function applicationStatusInquiry(ApplicationStatusInquiryRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(ApplicationStatusInquiryFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function riskRatingInquiry(RiskRatingInquiryRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(RiskRatingInquiryFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function accountValidationInquiry(AccountValidationInquiryRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(AccountValidationInquiryFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function updateKycStatus(UpdateKycStatusRequestContract $request)
    {
        try {
            $response = $this->api->handle($request);

            $contents = $response->getBody()->getContents();

            return \App::make(UpdateKycStatusFactoryContract::class)->makeResponse($request, $contents);
        } catch (HttpException $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function notifAccountOpeningStatus(NotifAccountOpeningStatusHandlerInterface $handler, callable $callback)
    {
        try {
            $callback($handler->products());
        } catch (Exception $e) {
            throw $e;
        }

        return $handler->response();
    }
}
