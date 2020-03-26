<?php

namespace Assetku\BankService\Apis\GuzzleHttp;

use Assetku\BankService\Contracts\Apis\ApiFactoryInterface;

class ApiFactory implements ApiFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function make(string $baseUri, int $timeout = 900)
    {
        return new Api($baseUri, $timeout);
    }
}
