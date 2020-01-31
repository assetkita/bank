<?php

namespace Assetku\BankService\Apis\Guzzle;

use Assetku\BankService\Contracts\Apis\Factory;

class ApiManager implements Factory
{
    /**
     * @inheritDoc
     */
    public function make(string $baseUri)
    {
        return new Api($baseUri);
    }
}
