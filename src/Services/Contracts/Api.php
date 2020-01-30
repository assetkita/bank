<?php

namespace Assetku\BankService\Services\Contracts;

use Assetku\BankService\Requests\Contracts\Request;
use Assetku\BankService\Services\GuzzleHttpApi;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

interface Api
{
    /**
     * Handle an outgoing request.
     *
     * @param  Request  $request
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function handle(Request $request);
}
