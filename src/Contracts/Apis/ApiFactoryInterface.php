<?php

namespace Assetku\BankService\Contracts\Apis;

interface ApiFactoryInterface
{
    /**
     * Create a new instance of api
     *
     * @param  string  $baseUri
     * @return ApiInterface
     */
    public function make(string $baseUri);
}
