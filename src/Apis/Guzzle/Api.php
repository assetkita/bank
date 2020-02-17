<?php

namespace Assetku\BankService\Apis\Guzzle;

use Assetku\BankService\Contracts\Apis\ApiContract as ApiContract;
use Assetku\BankService\Contracts\Base\BaseRequestContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferRequestContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentRequestContract;
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
