<?php

namespace Assetku\BankService\Providers;

use Assetku\BankService\Apis\GuzzleHttp\Api;
use Assetku\BankService\Apis\GuzzleHttp\ApiFactory;
use Assetku\BankService\BankService;
use Assetku\BankService\Contracts\Apis\ApiInterface;
use Assetku\BankService\Contracts\Apis\ApiFactoryInterface;
use Assetku\BankService\Contracts\ServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class BankServiceProvider extends ServiceProvider
{
    /**
     * Available bank service providers
     *
     * @var array
     */
    protected $serviceProviders = [
        'permatabank' => PermatabankServiceProvider::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bank.php', 'bank');

        $this->registerApi();

        $this->registerThirdPartyServiceProvider();

        $this->app->bind('bank_service', function () {
            return new BankService($this->app->make(ServiceInterface::class));
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

        Collection::macro('recursiveUrlEncode', function () {
            return $this->map(function ($value) {
                return urlencode($value);
            });
        });

        $this->bootValidator();
    }

    /**
     * Register api bindings
     *
     * @return void
     */
    protected function registerApi()
    {
        $this->app->singleton(ApiFactoryInterface::class, ApiFactory::class);
        $this->app->singleton(ApiInterface::class, Api::class);
    }

    /**
     * Register selected third party service provider
     *
     * @return void
     */
    protected function registerThirdPartyServiceProvider()
    {
        $default = \Config::get('bank.default');

        $selectedServiceProvider = $this->serviceProviders[$default];

        $this->app->register($selectedServiceProvider);
    }

    /**
     * Boot extended validator
     *
     * @return void
     */
    protected function bootValidator()
    {
        \Validator::extend('base64_encoded_content', function ($attribute, $value, $parameters) {
            return validate_base64_encoded_content($value, $parameters);
        });
    }
}
