<?php

namespace Assetku\BankService\Apis\Guzzle;

use Assetku\BankService\Contracts\Apis\ApiFactoryContract;

class ApiFactory implements ApiFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(string $baseUri)
    {
        return new Api($baseUri);
    }
}
