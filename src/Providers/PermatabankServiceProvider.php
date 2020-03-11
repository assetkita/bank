<?php

namespace Assetku\BankService\Providers;

use Assetku\BankService\AccessToken\Permatabank\AccessTokenRequest;
use Assetku\BankService\AccountValidationInquiry\Permatabank\AccountValidationInquiryFactory;
use Assetku\BankService\AccountValidationInquiry\Permatabank\AccountValidationInquiryRequest;
use Assetku\BankService\AccountValidationInquiry\Permatabank\AccountValidationInquiryResponse;
use Assetku\BankService\ApplicationStatusInquiry\Permatabank\ApplicationStatusInquiryFactory;
use Assetku\BankService\ApplicationStatusInquiry\Permatabank\ApplicationStatusInquiryRequest;
use Assetku\BankService\ApplicationStatusInquiry\Permatabank\ApplicationStatusInquiryResponse;
use Assetku\BankService\BalanceInquiry\Permatabank\BalanceInquiryFactory;
use Assetku\BankService\BalanceInquiry\Permatabank\BalanceInquiryRequest;
use Assetku\BankService\BalanceInquiry\Permatabank\BalanceInquiryResponse;
use Assetku\BankService\Contracts\AccessToken\AccessTokenRequestContract;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryFactoryContract;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryRequestContract;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryResponseContract;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryFactoryContract;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryRequestContract;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryResponseContract;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryFactoryContract;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryRequestContract;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryResponseContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferFactoryContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferRequestContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferResponseContract;
use Assetku\BankService\Contracts\NotifAccountOpeningStatus\NotifAccountOpeningStatusFactoryInterface;
use Assetku\BankService\Contracts\NotifAccountOpeningStatus\NotifAccountOpeningStatusHandlerInterface;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferFactoryContract;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferRequestContract;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferResponseContract;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryFactoryContract;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryRequestContract;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryResponseContract;
use Assetku\BankService\Contracts\Overbooking\OverbookingFactoryContract;
use Assetku\BankService\Contracts\Overbooking\OverbookingRequestContract;
use Assetku\BankService\Contracts\Overbooking\OverbookingResponseContract;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryFactoryContract;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryRequestContract;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryResponseContract;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryFactoryContract;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryRequestContract;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryResponseContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferFactoryContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferRequestContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferResponseContract;
use Assetku\BankService\Contracts\ServiceInterface;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryFactoryContract;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryRequestContract;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryResponseContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataResponseContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentResponseContract;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusFactoryContract;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusRequestContract;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusResponseContract;
use Assetku\BankService\LlgTransfer\Permatabank\LlgTransferFactory;
use Assetku\BankService\LlgTransfer\Permatabank\LlgTransferRequest;
use Assetku\BankService\LlgTransfer\Permatabank\LlgTransferResponse;
use Assetku\BankService\NotifAccountOpeningStatus\Permatabank\NotifAccountOpeningStatusFactory;
use Assetku\BankService\NotifAccountOpeningStatus\Permatabank\NotifAccountOpeningStatusHandler;
use Assetku\BankService\OnlineTransfer\Permatabank\OnlineTransferFactory;
use Assetku\BankService\OnlineTransfer\Permatabank\OnlineTransferRequest;
use Assetku\BankService\OnlineTransfer\Permatabank\OnlineTransferResponse;
use Assetku\BankService\OnlineTransferInquiry\Permatabank\OnlineTransferInquiryFactory;
use Assetku\BankService\OnlineTransferInquiry\Permatabank\OnlineTransferInquiryRequest;
use Assetku\BankService\OnlineTransferInquiry\Permatabank\OnlineTransferInquiryResponse;
use Assetku\BankService\Overbooking\Permatabank\OverbookingFactory;
use Assetku\BankService\Overbooking\Permatabank\OverbookingRequest;
use Assetku\BankService\Overbooking\Permatabank\OverbookingResponse;
use Assetku\BankService\OverbookingInquiry\Permatabank\OverbookingInquiryFactory;
use Assetku\BankService\OverbookingInquiry\Permatabank\OverbookingInquiryRequest;
use Assetku\BankService\OverbookingInquiry\Permatabank\OverbookingInquiryResponse;
use Assetku\BankService\RiskRatingInquiry\Permatabank\RiskRatingInquiryFactory;
use Assetku\BankService\RiskRatingInquiry\Permatabank\RiskRatingInquiryRequest;
use Assetku\BankService\RiskRatingInquiry\Permatabank\RiskRatingInquiryResponse;
use Assetku\BankService\RtgsTransfer\Permatabank\RtgsTransferFactory;
use Assetku\BankService\RtgsTransfer\Permatabank\RtgsTransferRequest;
use Assetku\BankService\RtgsTransfer\Permatabank\RtgsTransferResponse;
use Assetku\BankService\Services\PermatabankService;
use Assetku\BankService\StatusTransactionInquiry\Permatabank\StatusTransactionInquiryFactory;
use Assetku\BankService\StatusTransactionInquiry\Permatabank\StatusTransactionInquiryRequest;
use Assetku\BankService\StatusTransactionInquiry\Permatabank\StatusTransactionInquiryResponse;
use Assetku\BankService\SubmitApplicationData\Permatabank\SubmitApplicationDataFactory;
use Assetku\BankService\SubmitApplicationData\Permatabank\SubmitApplicationDataRequest;
use Assetku\BankService\SubmitApplicationData\Permatabank\SubmitApplicationDataResponse;
use Assetku\BankService\SubmitApplicationDocument\Permatabank\SubmitApplicationDocumentFactory;
use Assetku\BankService\SubmitApplicationDocument\Permatabank\SubmitApplicationDocumentRequest;
use Assetku\BankService\SubmitApplicationDocument\Permatabank\SubmitApplicationDocumentResponse;
use Assetku\BankService\UpdateKycStatus\Permatabank\UpdateKycStatusFactory;
use Assetku\BankService\UpdateKycStatus\Permatabank\UpdateKycStatusRequest;
use Assetku\BankService\UpdateKycStatus\Permatabank\UpdateKycStatusResponse;
use Illuminate\Support\ServiceProvider;

class PermatabankServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // service
        $this->app->singleton(ServiceInterface::class, PermatabankService::class);

        // access token
        $this->app->bind(AccessTokenRequestContract::class, AccessTokenRequest::class);

        // balance inquiry
        $this->app->bind(BalanceInquiryFactoryContract::class, BalanceInquiryFactory::class);
        $this->app->bind(BalanceInquiryRequestContract::class, BalanceInquiryRequest::class);
        $this->app->bind(BalanceInquiryResponseContract::class, BalanceInquiryResponse::class);

        // overbooking inquiry
        $this->app->bind(OverbookingInquiryFactoryContract::class, OverbookingInquiryFactory::class);
        $this->app->bind(OverbookingInquiryRequestContract::class, OverbookingInquiryRequest::class);
        $this->app->bind(OverbookingInquiryResponseContract::class, OverbookingInquiryResponse::class);

        // online transfer inquiry
        $this->app->bind(OnlineTransferInquiryFactoryContract::class, OnlineTransferInquiryFactory::class);
        $this->app->bind(OnlineTransferInquiryRequestContract::class, OnlineTransferInquiryRequest::class);
        $this->app->bind(OnlineTransferInquiryResponseContract::class, OnlineTransferInquiryResponse::class);

        // status transaction inquiry
        $this->app->bind(StatusTransactionInquiryFactoryContract::class, StatusTransactionInquiryFactory::class);
        $this->app->bind(StatusTransactionInquiryRequestContract::class, StatusTransactionInquiryRequest::class);
        $this->app->bind(StatusTransactionInquiryResponseContract::class, StatusTransactionInquiryResponse::class);

        // overbooking
        $this->app->bind(OverbookingFactoryContract::class, OverbookingFactory::class);
        $this->app->bind(OverbookingRequestContract::class, OverbookingRequest::class);
        $this->app->bind(OverbookingResponseContract::class, OverbookingResponse::class);

        // online transfer
        $this->app->bind(OnlineTransferFactoryContract::class, OnlineTransferFactory::class);
        $this->app->bind(OnlineTransferRequestContract::class, OnlineTransferRequest::class);
        $this->app->bind(OnlineTransferResponseContract::class, OnlineTransferResponse::class);

        // llg transfer
        $this->app->bind(LlgTransferFactoryContract::class, LlgTransferFactory::class);
        $this->app->bind(LlgTransferRequestContract::class, LlgTransferRequest::class);
        $this->app->bind(LlgTransferResponseContract::class, LlgTransferResponse::class);

        // rtgs transfer
        $this->app->bind(RtgsTransferFactoryContract::class, RtgsTransferFactory::class);
        $this->app->bind(RtgsTransferRequestContract::class, RtgsTransferRequest::class);
        $this->app->bind(RtgsTransferResponseContract::class, RtgsTransferResponse::class);

        // submit application data
        $this->app->bind(SubmitApplicationDataFactoryContract::class, SubmitApplicationDataFactory::class);
        $this->app->bind(SubmitApplicationDataRequestContract::class, SubmitApplicationDataRequest::class);
        $this->app->bind(SubmitApplicationDataResponseContract::class, SubmitApplicationDataResponse::class);

        // submit application document
        $this->app->bind(SubmitApplicationDocumentFactoryContract::class, SubmitApplicationDocumentFactory::class);
        $this->app->bind(SubmitApplicationDocumentRequestContract::class, SubmitApplicationDocumentRequest::class);
        $this->app->bind(SubmitApplicationDocumentResponseContract::class, SubmitApplicationDocumentResponse::class);

        // application status inquiry
        $this->app->bind(ApplicationStatusInquiryFactoryContract::class, ApplicationStatusInquiryFactory::class);
        $this->app->bind(ApplicationStatusInquiryRequestContract::class, ApplicationStatusInquiryRequest::class);
        $this->app->bind(ApplicationStatusInquiryResponseContract::class, ApplicationStatusInquiryResponse::class);

        // risk rating inquiry
        $this->app->bind(RiskRatingInquiryFactoryContract::class, RiskRatingInquiryFactory::class);
        $this->app->bind(RiskRatingInquiryRequestContract::class, RiskRatingInquiryRequest::class);
        $this->app->bind(RiskRatingInquiryResponseContract::class, RiskRatingInquiryResponse::class);

        // account validation inquiry
        $this->app->bind(AccountValidationInquiryFactoryContract::class, AccountValidationInquiryFactory::class);
        $this->app->bind(AccountValidationInquiryRequestContract::class, AccountValidationInquiryRequest::class);
        $this->app->bind(AccountValidationInquiryResponseContract::class, AccountValidationInquiryResponse::class);

        // update kyc status
        $this->app->bind(UpdateKycStatusFactoryContract::class, UpdateKycStatusFactory::class);
        $this->app->bind(UpdateKycStatusRequestContract::class, UpdateKycStatusRequest::class);
        $this->app->bind(UpdateKycStatusResponseContract::class, UpdateKycStatusResponse::class);

        // notif account opening status
        $this->app->bind(NotifAccountOpeningStatusFactoryInterface::class, NotifAccountOpeningStatusFactory::class);
        $this->app->bind(NotifAccountOpeningStatusHandlerInterface::class, NotifAccountOpeningStatusHandler::class);
    }
}
