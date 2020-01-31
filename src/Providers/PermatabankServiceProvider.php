<?php

namespace Assetku\BankService\Providers;

use Assetku\BankService\Contracts\Inquiries\BalanceInquiry;
use Assetku\BankService\Contracts\Inquiries\BalanceInquiryFactory;
use Assetku\BankService\Contracts\Inquiries\OnlineTransferInquiry;
use Assetku\BankService\Contracts\Inquiries\OnlineTransferInquiryFactory;
use Assetku\BankService\Contracts\Inquiries\OverbookingInquiry;
use Assetku\BankService\Contracts\Inquiries\OverbookingInquiryFactory;
use Assetku\BankService\Contracts\Inquiries\StatusTransactionInquiry;
use Assetku\BankService\Contracts\Inquiries\StatusTransactionInquiryFactory;
use Assetku\BankService\Contracts\Requests\AccessTokenRequest;
use Assetku\BankService\Contracts\Requests\BalanceInquiryRequest;
use Assetku\BankService\Contracts\Requests\BalanceInquiryRequestFactory;
use Assetku\BankService\Contracts\Requests\LlgTransferRequest;
use Assetku\BankService\Contracts\Requests\LlgTransferRequestFactory;
use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequest;
use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequestFactory;
use Assetku\BankService\Contracts\Requests\OnlineTransferRequest;
use Assetku\BankService\Contracts\Requests\OnlineTransferRequestFactory;
use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequest;
use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequestFactory;
use Assetku\BankService\Contracts\Requests\OverbookingRequest;
use Assetku\BankService\Contracts\Requests\OverbookingRequestFactory;
use Assetku\BankService\Contracts\Requests\RtgsTransferRequest;
use Assetku\BankService\Contracts\Requests\RtgsTransferRequestFactory;
use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequest;
use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequestFactory;
use Assetku\BankService\Contracts\Transfers\LlgTransfer;
use Assetku\BankService\Contracts\Transfers\LlgTransferFactory;
use Assetku\BankService\Contracts\Transfers\OnlineTransfer;
use Assetku\BankService\Contracts\Transfers\OnlineTransferFactory;
use Assetku\BankService\Contracts\Transfers\Overbooking;
use Assetku\BankService\Contracts\Transfers\OverbookingFactory;
use Assetku\BankService\Contracts\Transfers\RtgsTransfer;
use Assetku\BankService\Contracts\Transfers\RtgsTransferFactory;
use Assetku\BankService\Inquiries\Permatabank\BalanceInquiryManager;
use Assetku\BankService\Inquiries\Permatabank\OnlineTransferInquiryManager;
use Assetku\BankService\Inquiries\Permatabank\OverbookingInquiryManager;
use Assetku\BankService\Inquiries\Permatabank\StatusTransactionInquiryManager;
use Assetku\BankService\Requests\Permatabank\BalanceInquiryRequestManager;
use Assetku\BankService\Requests\Permatabank\LlgTransferRequestManager;
use Assetku\BankService\Requests\Permatabank\OnlineTransferInquiryRequestManager;
use Assetku\BankService\Requests\Permatabank\OnlineTransferRequestManager;
use Assetku\BankService\Requests\Permatabank\OverbookingInquiryRequestManager;
use Assetku\BankService\Requests\Permatabank\OverbookingRequestManager;
use Assetku\BankService\Requests\Permatabank\RtgsTransferRequestManager;
use Assetku\BankService\Requests\Permatabank\StatusTransactionInquiryRequestManager;
use Assetku\BankService\Services\Contracts\Service;
use Assetku\BankService\Services\PermatabankService;
use Assetku\BankService\Transfers\Permatabank\LlgTransferManager;
use Assetku\BankService\Transfers\Permatabank\OnlineTransferManager;
use Assetku\BankService\Transfers\Permatabank\OverbookingManager;
use Assetku\BankService\Transfers\Permatabank\RtgsTransferManager;
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
        $this->app->singleton(Service::class, PermatabankService::class);

        $this->app->bind(
            AccessTokenRequest::class,
            \Assetku\BankService\Requests\Permatabank\AccessTokenRequest::class
        );

        $this->app->bind(
            BalanceInquiryRequestFactory::class,
            BalanceInquiryRequestManager::class
        );

        $this->app->bind(
            BalanceInquiryRequest::class,
            \Assetku\BankService\Requests\Permatabank\BalanceInquiryRequest::class
        );

        $this->app->bind(
            OverbookingInquiryRequestFactory::class,
            OverbookingInquiryRequestManager::class
        );

        $this->app->bind(
            OverbookingInquiryRequest::class,
            \Assetku\BankService\Requests\Permatabank\OverbookingInquiryRequest::class
        );

        $this->app->bind(
            OnlineTransferInquiryRequestFactory::class,
            OnlineTransferInquiryRequestManager::class
        );

        $this->app->bind(
            OnlineTransferInquiryRequest::class,
            \Assetku\BankService\Requests\Permatabank\OnlineTransferInquiryRequest::class
        );

        $this->app->bind(
            StatusTransactionInquiryRequestFactory::class,
            StatusTransactionInquiryRequestManager::class
        );

        $this->app->bind(
            StatusTransactionInquiryRequest::class,
            \Assetku\BankService\Requests\Permatabank\StatusTransactionInquiryRequest::class
        );

        $this->app->bind(
            OverbookingRequestFactory::class,
            OverbookingRequestManager::class
        );

        $this->app->bind(
            OverbookingRequest::class,
            \Assetku\BankService\Requests\Permatabank\OverbookingRequest::class
        );

        $this->app->bind(
            OnlineTransferRequestFactory::class,
            OnlineTransferRequestManager::class
        );

        $this->app->bind(
            OnlineTransferRequest::class,
            \Assetku\BankService\Requests\Permatabank\OnlineTransferRequest::class
        );

        $this->app->bind(
            LlgTransferRequestFactory::class,
            LlgTransferRequestManager::class
        );

        $this->app->bind(
            LlgTransferRequest::class,
            \Assetku\BankService\Requests\Permatabank\LlgTransferRequest::class
        );

        $this->app->bind(
            RtgsTransferRequestFactory::class,
            RtgsTransferRequestManager::class
        );

        $this->app->bind(
            RtgsTransferRequest::class,
            \Assetku\BankService\Requests\Permatabank\RtgsTransferRequest::class
        );

        $this->app->bind(
            BalanceInquiryFactory::class,
            BalanceInquiryManager::class
        );

        $this->app->bind(
            BalanceInquiry::class,
            \Assetku\BankService\Inquiries\Permatabank\BalanceInquiry::class
        );

        $this->app->bind(
            OverbookingInquiryFactory::class,
            OverbookingInquiryManager::class
        );

        $this->app->bind(
            OverbookingInquiry::class,
            \Assetku\BankService\Inquiries\Permatabank\OverbookingInquiry::class
        );

        $this->app->bind(
            OnlineTransferInquiryFactory::class,
            OnlineTransferInquiryManager::class
        );

        $this->app->bind(
            OnlineTransferInquiry::class,
            \Assetku\BankService\Inquiries\Permatabank\OnlineTransferInquiry::class
        );

        $this->app->bind(
            StatusTransactionInquiryFactory::class,
            StatusTransactionInquiryManager::class
        );

        $this->app->bind(
            StatusTransactionInquiry::class,
            \Assetku\BankService\Inquiries\Permatabank\StatusTransactionInquiry::class
        );

        $this->app->bind(
            OverbookingFactory::class,
            OverbookingManager::class
        );

        $this->app->bind(
            Overbooking::class,
            \Assetku\BankService\Transfers\Permatabank\Overbooking::class
        );

        $this->app->bind(
            OnlineTransferFactory::class,
            OnlineTransferManager::class
        );

        $this->app->bind(
            OnlineTransfer::class,
            \Assetku\BankService\Transfers\Permatabank\OnlineTransfer::class
        );

        $this->app->bind(
            LlgTransferFactory::class,
            LlgTransferManager::class
        );

        $this->app->bind(
            LlgTransfer::class,
            \Assetku\BankService\Transfers\Permatabank\LlgTransfer::class
        );

        $this->app->bind(
            RtgsTransferFactory::class,
            RtgsTransferManager::class
        );

        $this->app->bind(
            RtgsTransfer::class,
            \Assetku\BankService\Transfers\Permatabank\RtgsTransfer::class
        );
    }
}
