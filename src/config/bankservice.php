<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Default Digital Signature
    |--------------------------------------------------------------------------
    |
    | This option controls the default digital signature connection that gets used while
    | using this digital signature library. This connection is used when another is
    | not explicitly specified when executing a given digital signature function.
    |
    */
    'default'  => env('BANK_SERVICES_DRIVER', 'permata'),

    /*
    |--------------------------------------------------------------------------
    | Digital Signature Services
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many digital signature "services" as you wish, and you
    | may even configure multiple services of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "privy",
    |
    */
    'services' => [

        'permata' => [
            'api_key' => env('PERMATABANK_API_KEY'),
            'client_id' => env('PERMATABANK_CLIENT_ID'),
            'client_secret' => env('PERMATABANK_CLIENT_SECRET'),
            'permata_static_key' => env('PERMATABANK_STATIC_KEY'),
            'permata_organization_name' => env('PERMATABANK_GROUP_ID'),
            'instcode' => env('INSTCODE'),
            'endpoint' => [
                'development' => env('PERMATABANK_ENDPOINT_DEVELOPMENT'),
                'production' => env('PERMATABANK_ENDPOINT_PRODUCTION')
            ]
        ]

    ]
];