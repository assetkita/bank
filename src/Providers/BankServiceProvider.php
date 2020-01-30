<?php

namespace Assetku\BankService\Providers;

use Assetku\BankService\BankService;
use Assetku\BankService\Exceptions\ProviderException;
use Assetku\BankService\Requests\Contracts\AccessTokenRequest;
use Assetku\BankService\Requests\Contracts\BalanceInquiryRequest;
use Assetku\BankService\Requests\Contracts\Factories\BalanceInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\LlgTransferRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OnlineTransferInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OnlineTransferRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OverbookingInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OverbookingRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\RtgsTransferRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\StatusTransactionInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\LlgTransferRequest;
use Assetku\BankService\Requests\Contracts\OnlineTransferInquiryRequest;
use Assetku\BankService\Requests\Contracts\OnlineTransferRequest;
use Assetku\BankService\Requests\Contracts\OverbookingInquiryRequest;
use Assetku\BankService\Requests\Contracts\OverbookingRequest;
use Assetku\BankService\Requests\Contracts\RtgsTransferRequest;
use Assetku\BankService\Requests\Contracts\StatusTransactionInquiryRequest;
use Assetku\BankService\Services\Contracts\Api;
use Assetku\BankService\Services\Contracts\Service;
use Assetku\BankService\Services\GuzzleHttpApi;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class BankServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $providers = [
        'permatabank' => [
            Service::class                                => \Assetku\BankService\Services\Permatabank\Service::class,
            AccessTokenRequest::class                     => \Assetku\BankService\Requests\Permatabank\AccessTokenRequest::class,
            // disbursement
            BalanceInquiryRequestFactory::class           => \Assetku\BankService\Requests\Permatabank\Factories\BalanceInquiryRequestFactory::class,
            BalanceInquiryRequest::class                  => \Assetku\BankService\Requests\Permatabank\BalanceInquiryRequest::class,
            OverbookingInquiryRequestFactory::class       => \Assetku\BankService\Requests\Permatabank\Factories\OverbookingInquiryRequestFactory::class,
            OverbookingInquiryRequest::class              => \Assetku\BankService\Requests\Permatabank\OverbookingInquiryRequest::class,
            OnlineTransferInquiryRequestFactory::class    => \Assetku\BankService\Requests\Permatabank\Factories\OnlineTransferInquiryRequestFactory::class,
            OnlineTransferInquiryRequest::class           => \Assetku\BankService\Requests\Permatabank\OnlineTransferInquiryRequest::class,
            StatusTransactionInquiryRequestFactory::class => \Assetku\BankService\Requests\Permatabank\Factories\StatusTransactionInquiryRequestFactory::class,
            StatusTransactionInquiryRequest::class        => \Assetku\BankService\Requests\Permatabank\StatusTransactionInquiryRequest::class,
            OverbookingRequestFactory::class              => \Assetku\BankService\Requests\Permatabank\Factories\OverbookingRequestFactory::class,
            OverbookingRequest::class                     => \Assetku\BankService\Requests\Permatabank\OverbookingRequest::class,
            OnlineTransferRequestFactory::class           => \Assetku\BankService\Requests\Permatabank\Factories\OnlineTransferRequestFactory::class,
            OnlineTransferRequest::class                  => \Assetku\BankService\Requests\Permatabank\OnlineTransferRequest::class,
            LlgTransferRequestFactory::class              => \Assetku\BankService\Requests\Permatabank\Factories\LlgTransferRequestFactory::class,
            LlgTransferRequest::class                     => \Assetku\BankService\Requests\Permatabank\LlgTransferRequest::class,
            RtgsTransferRequestFactory::class             => \Assetku\BankService\Requests\Permatabank\Factories\RtgsTransferRequestFactory::class,
            RtgsTransferRequest::class                    => \Assetku\BankService\Requests\Permatabank\RtgsTransferRequest::class,
            // fund account
        ],
    ];

    /**
     * Register any application services.
     *
     * @return void
     * @throws ProviderException
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bank.php', 'bank');

        $this->app->singleton(Api::class, function (Application $app, array $params) {
            return new GuzzleHttpApi($params);
        });

        try {
            $this->registerProvider();
        } catch (ProviderException $e) {
            throw $e;
        }

        $this->app->bind('bank', function () {
            return new BankService;
        });

        Collection::macro('recursiveTrim', function () {
            return $this->map(function ($value) {
                if (is_array($value)) {
                    return Collection::make($value)->recursiveTrim();
                }

                if (is_numeric($value)) {
                    return $value;
                }

                return str_replace(' ', '', $value);
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/bank.php' => config_path('bank.php'),
        ], 'config');
    }

    /**
     * Register third party bank service provider
     *
     * @throws ProviderException
     */
    protected function registerProvider()
    {
        $default = \Config::get('bank.default');

        if (! in_array($default, array_keys($this->providers))) {
            throw new ProviderException('Undefined bank provider.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        foreach ($this->providers[$default] as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
