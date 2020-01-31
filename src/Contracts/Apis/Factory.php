<?php

namespace Assetku\BankService\Contracts\Apis;

interface Factory
{
    /**
     * Create a new instance of api
     *
     * @param  string  $baseUri
     * @return Api
     */
    public function make(string $baseUri);
}
