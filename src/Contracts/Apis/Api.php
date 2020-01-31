<?php

namespace Assetku\BankService\Contracts\Apis;

use Assetku\BankService\Contracts\Requests\Request;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

interface Api
{
    /**
     * Handle an outgoing request.
     *
     * @param  Request  $request
     * @return ResponseInterface
     * @throws RequestException
     */
    public function handle(Request $request);
}
