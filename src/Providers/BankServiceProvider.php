<?php

namespace Assetku\BankService\Providers;

use Assetku\BankService\Bank;
use Assetku\BankService\Services\BankProvider;
use Illuminate\Support\ServiceProvider;
use Assetku\BankService\Services\Permatabank\Permatabank;

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
                $bankProvider = Permatabank::class;
                break;
        }

        $this->app->bind(BankProvider::class, $bankProvider);

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
