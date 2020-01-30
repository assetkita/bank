<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Service Provider
    |--------------------------------------------------------------------------
    |
    | This option controls the default exchange rate provider that will be used on various exchange rate transactions.
    | Supported: "permatabank"
    |
    */
    'default'   => env('BANK_PROVIDER', 'permatabank'),

    /*
    |--------------------------------------------------------------------------
    | Bank Providers
    |--------------------------------------------------------------------------
    |
    | Here you may configure the providers information for each services that is used by your application.
    |
    */
    'providers' => [

        'permatabank' => [
            'api_key'                   => env('PERMATABANK_API_KEY'),
            'client_id'                 => env('PERMATABANK_CLIENT_ID'),
            'client_secret'             => env('PERMATABANK_CLIENT_SECRET'),
            'permata_static_key'        => env('PERMATABANK_STATIC_KEY'),
            'permata_organization_name' => env('PERMATABANK_GROUP_ID'),
            'instcode'                  => env('PERMATABANK_INSTCODE'),
            'development'               => [
                'base_url' => env('PERMATABANK_BASE_URL_DEVELOPMENT')
            ],
            'production'                => [
                'base_url' => env('PERMATABANK_BASE_URL_PRODUCTION')
            ],
        ],

    ],

];
