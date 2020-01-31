<?php

namespace Assetku\BankService\Providers;

use Assetku\BankService\Apis\Guzzle\ApiManager;
use Assetku\BankService\BankService;
use Assetku\BankService\Contracts\Apis\Api;
use Assetku\BankService\Contracts\Apis\Factory;
use Assetku\BankService\Services\Contracts\Service;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class BankServiceProvider extends ServiceProvider
{
    /**
     * The available bank service provider
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

        $this->app->singleton(Factory::class, ApiManager::class);
        $this->app->singleton(Api::class, \Assetku\BankService\Apis\Guzzle\Api::class);

        $this->app->register($this->serviceProviders[\Config::get('bank.default')]);

        $this->app->bind('bank_service', function () {
            return new BankService($this->app->make(Service::class));
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
    }
}
