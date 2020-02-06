<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default PermatabankService Provider
    |--------------------------------------------------------------------------
    |
    | This option controls the default bank provider that will be used on various bank transactions.
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
            'api_key'       => env('PERMATABANK_API_KEY'),
            'client_id'     => env('PERMATABANK_CLIENT_ID'),
            'client_secret' => env('PERMATABANK_CLIENT_SECRET'),
            'static_key'    => env('PERMATABANK_STATIC_KEY'),
            'instcode'      => env('PERMATABANK_INSTCODE'),
            'development'   => [
                'base_url' => env('PERMATABANK_BASE_URL_DEVELOPMENT'),
                'group_id' => env('PERMATABANK_GROUP_ID_DEVELOPMENT'),
            ],
            'production'    => [
                'base_url' => env('PERMATABANK_BASE_URL_PRODUCTION'),
                'group_id' => env('PERMATABANK_GROUP_ID_PRODUCTION'),
            ],
        ],

    ],

];
