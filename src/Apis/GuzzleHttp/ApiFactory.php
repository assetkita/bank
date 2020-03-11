<?php

namespace Assetku\BankService\Apis\GuzzleHttp;

use Assetku\BankService\Contracts\Apis\ApiFactoryInterface;

class ApiFactory implements ApiFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function make(string $baseUri)
    {
        return new Api($baseUri);
    }
}
