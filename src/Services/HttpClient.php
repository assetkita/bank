<?php

namespace Assetku\BankService\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HttpClient
{
    /**
     * @var string
     */
    const FORM_PARAMS = 'form_params';

    /**
     * @var string
     */
    const JSON_PARAMS = 'json';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * HttpClient constructor.
     *
     * @param  array  $config
     */
    public function __construct($config = [])
    {
        $config['timeout'] = 30;

        if (empty($config['handler'])) {
            $stack = new HandlerStack;
            $stack->setHandler(new CurlHandler);
            $config['handler'] = $stack;
        }

        $config['handler']->push(
            $this->appendRequest()
        );

        $this->client = new Client($config);
    }

    /**
     * Guzzle post request
     *
     * @param  string  $uri
     * @param  mixed  $data
     * @param  array  $headers
     * @param  string  $mode
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function post(string $uri, $data, $headers = [], $mode = self::JSON_PARAMS)
    {
        $payload = [
            $mode => $data,
        ];

        if (isset($headers)) {
            $payload['headers'] = $headers;
        }

        try {
            return $this->client->request('post', $uri, $payload);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    private function appendRequest()
    {
        $class = $this;
        return function (callable $handler) use ($class) {
            return function (RequestInterface $request, array $options) use ($handler, $class) {
                $class->setRequest($request);
                return $handler($request, $options);
            };
        };
    }

    /**
     * Set Request
     *
     * @param GuzzleHttp\Psr7\Request $request
     */
    public function setRequest(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * get Request
     * 
     * @return void
     */
    public function getRequest()
    {
        return $this->request;
    }
}
