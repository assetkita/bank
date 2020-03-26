<?php

namespace Assetku\BankService\Apis\GuzzleHttp;

use Assetku\BankService\Contracts\Apis\ApiInterface;
use Assetku\BankService\Contracts\Base\BaseRequestContract;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Api implements ApiInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Api constructor.
     *
     * @param  string  $baseUri
     * @param  int  $timeout
     */
    public function __construct(string $baseUri, int $timeout)
    {
        $this->client = new Client([
            'base_uri' => $baseUri,
            'timeout'  => $timeout,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function handle(BaseRequestContract $request)
    {
        $options = [
            $request->encoder()->type() => $request->data(),
            'headers'                   => $request->header()->content(),
        ];

        try {
            return $this->client->request($request->method(), $request->uri(), $options);
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
