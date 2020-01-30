<?php

namespace Assetku\BankService\Services;

use Assetku\BankService\Requests\Contracts\OverbookingRequest;
use Assetku\BankService\Requests\Contracts\Request;
use Assetku\BankService\Services\Contracts\Api;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;

class GuzzleHttpApi implements Api
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * Api constructor.
     *
     * @param  array  $config
     */
    public function __construct(array $config)
    {
        $this->client = new Client($config);
    }

    /**
     * @inheritDoc
     */
    public function handle(Request $request)
    {
        $options = [
            $request->encoder()->type() => $request->data(),
            'headers'                   => $request->header()->make(),
        ];

        try {
            return $this->client->request($request->method(), $request->uri(), $options);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
