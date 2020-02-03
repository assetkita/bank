<?php

namespace Assetku\BankService\Contracts\Apis;

interface ApiFactoryContract
{
    /**
     * Create a new instance of api
     *
     * @param  string  $baseUri
     * @return ApiContract
     */
    public function make(string $baseUri);
}
