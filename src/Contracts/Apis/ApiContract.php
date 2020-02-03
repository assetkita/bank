<?php

namespace Assetku\BankService\Contracts\Apis;

use Assetku\BankService\Contracts\Base\BaseRequestContract;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

interface ApiContract
{
    /**
     * Handle an outgoing request.
     *
     * @param  BaseRequestContract  $request
     * @return ResponseInterface
     * @throws RequestException
     */
    public function handle(BaseRequestContract $request);
}
