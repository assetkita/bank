# Assetkita Bank API Package

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
<!-- [![Contributor Covenant][ico-code-of-conduct]](CODE_OF_CONDUCT.md) -->

_Laravel Bank API package for Asset Kita._


## Requirements

- [Laravel v5.5.*](https://laravel.com)
- [guzzlehttp/guzzle v6.3.3](http://docs.guzzlephp.org/)


## Install

Require this package with composer using the following command:

```bash
composer require assetkita/bank
```


## Configuration

This package needs some configuration to utilizing bank API Services. Add these lines to your .env, then update respective values
based on your preferences.

```dotenv
PERMATABANK_API_KEY=
PERMATABANK_CLIENT_ID=
PERMATABANK_CLIENT_SECRET=
PERMATABANK_STATIC_KEY=
PERMATABANK_GROUP_ID=
INSTCODE=

PERMATABANK_ENDPOINT_DEVELOPMENT=
PERMATABANK_ENDPOINT_PRODUCTION=
```

Publish package configuration via command:

```bash
php artisan vendor:publish --provider="Assetku\BankService\Providers\BankServiceProvider" --tag=config
```


## Bank Service Facade

This package offers features to manage banking API transactions
along with helpful facade `Bank`.
 
### Get Bearer token

Use it with syntax `Bank::getToken()`.

This will return string of bearer token

### Overbooking

Use it with syntax `Bank::overbooking($data, $custRefID)`

Provide an array of data for overbooking transaction and string of customer references id.
also you can randomly generate the customer references id.

### Overbooking inquiry

Use it with syntax `Bank::inquiryOverbooking($data, $custRefID)`

Provide an array of data for inquiry overbooking transaction and string of customer references id.
also you can randomly generate the customer references id.

### Online transfer inquiry

Use it with syntax `Bank::onlineTransferInquiry($data, $custRefID)`

Provide an array of data for online transfer inquiry transaction and string of customer references id.
also you can randomly generate the customer references id.

### Online transfer

Use it with syntax `Bank::onlineTransfer($data, $custRefID)`

Provide an array of data for online transfer transaction and string of customer references id.
also you can randomly generate the customer references id.

### LLG Transfer

Use it with syntax `Bank::llgTransfer($data, $custRefID)`

Provide an array of data for LLG transfer transaction and string of customer references id.
also you can randomly generate the customer references id.

### Inquiry Status Transaction

Use it with syntax `Bank::inquiryStatusTransaction($custRefID)`

Provide the string of customer reference id

## Testing

The tests are written with `phpunit`. 

Please provide a `.env.testing` file in root package directory with contents 
same as `.env.example` before running test command.

You can run the tests from the root of the project directory with the following command.

```bash
vendor/bin/phpunit
```


## License

The Digital Signature package is open source software licensed under the
[GNU LGPL license version 3](https://opensource.org/licenses/LGPL-3.0)

[ico-version]: https://img.shields.io/packagist/v/assetkita/bank-service.svg?style=flat-square
[ico-license]: https://img.shields.io/packagist/l/assetkita/bank-service.svg?style=flat-square
[ico-code-of-conduct]: https://img.shields.io/badge/Contributor%20Covenant-v1.4%20adopted-ff69b4.svg
[link-packagist]: https://packagist.org/packages/assetkita/bank-service
