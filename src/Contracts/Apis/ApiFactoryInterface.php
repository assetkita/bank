<?php

namespace Assetku\BankService\Contracts\Apis;

interface ApiFactoryInterface
{
    /**
     * Create a new instance of api
     *
     * @param  string  $baseUri
     * @param  int  $timeout
     * @return ApiInterface
     */
    public function make(string $baseUri, int $timeout);
}
