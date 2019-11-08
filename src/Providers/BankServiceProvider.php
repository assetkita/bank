<?php

namespace Assetku\BankService\Providers;

use Assetku\BankService\Bank;
use Illuminate\Support\ServiceProvider;
use Assetku\BankService\Contracts\BankContract;
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
        $this->mergeConfigFrom(__DIR__ . '/../config/bankservice.php', 'bankservice');

        switch (config('bankservice.default')) {
            case 'permatabank':
                $bankProvider = Permatabank::class;
                break;
            default:
                $bankProvider = Permatabank::class;
                break;
        }

        $this->app->bind(BankContract::class, $bankProvider);

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
            __DIR__ . '/../config/bankservice.php' => config_path('bankservice.php')
        ], 'config');
    }
}