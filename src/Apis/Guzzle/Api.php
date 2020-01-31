<?php

namespace Assetku\BankService\Apis\Guzzle;

use Assetku\BankService\Contracts\Apis\Api as ApiContract;
use Assetku\BankService\Contracts\Requests\Request;
use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;

class Api implements ApiContract
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
     * @param  string  $baseUri
     */
    public function __construct(string $baseUri)
    {
        $this->client = new Client([
            'base_uri' => $baseUri,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function handle(Request $request)
    {
        $options = [
            $request->encoder()->type() => $request->data(),
            'headers'                   => $request->header()->content(),
        ];

//        if ($request instanceof StatusTransactionInquiryRequest) {
//            dd($options);
//        }

        try {
            return $this->client->request($request->method(), $request->uri(), $options);
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
