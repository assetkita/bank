<?php

namespace Assetku\BankService\Providers;

use Assetku\BankService\Bank;
use Assetku\BankService\Services\BankService;
use Illuminate\Support\ServiceProvider;

class BankServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bankservice.php', 'bankservice');

        switch (config('bankservice.default')) {
            default:
                $service = \Assetku\BankService\Services\Permatabank\Service::class;
                break;
        }

        $this->app->bind(BankService::class, $service);

        $this->app->bind('assetkita.bank', function () {
            return new Bank;
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
            __DIR__.'/../config/bankservice.php' => config_path('bankservice.php')
        ], 'config');
    }
}
