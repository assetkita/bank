<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Facades\Bank;
use Faker\Factory;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Assetku\BankService\Providers\BankServiceProvider;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * @var Factory
     */
    protected $faker;

    /**
     * TestCase constructor.
     *
     * @param  null  $name
     * @param  array  $data
     * @param  string  $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->faker = Factory::create('id_ID');
    }


    /**
     * Get package service provider
     *
     * @param  Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            BankServiceProvider::class,
        ];
    }

    /**
     * Get package alias
     *
     * @param  Application  $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Bank' => Bank::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->useEnvironmentPath(__DIR__.'/../..')
            ->loadEnvironmentFrom('.env.testing')
            ->bootstrapWith([
                LoadEnvironmentVariables::class
            ]);

        $app['config']->set('bankservice.default', env('BANK_SERVICES_DRIVER'));

        $app['config']->set('bankservice.services.permata', [
            'api_key'                   => env('PERMATABANK_API_KEY'),
            'client_id'                 => env('PERMATABANK_CLIENT_ID'),
            'client_secret'             => env('PERMATABANK_CLIENT_SECRET'),
            'permata_static_key'        => env('PERMATABANK_STATIC_KEY'),
            'permata_organization_name' => env('PERMATABANK_GROUP_ID'),
            'instcode'                  => env('INSTCODE'),
            'endpoint'                  => [
                'development' => env('PERMATABANK_ENDPOINT_DEVELOPMENT'),
                'production'  => env('PERMATABANK_ENDPOINT_PRODUCTION')
            ]
        ]);
    }
}