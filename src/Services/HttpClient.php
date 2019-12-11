<?php

namespace Assetku\BankService\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\CurlHandler;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Exception\GuzzleException;

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
     * @var $http
     */
    protected $http;

    /**
     * @var $request
     */
    protected $request;

    /**
     * init
     * 
     * @param array $config
     */
    public function __construct($config = [])
    {
        $config['timeout'] = 30;

        if (empty($config['handler'])) {
            $stack = new HandlerStack();
            $stack->setHandler(new CurlHandler());
            $config['handler'] = $stack;
        }

        $config['handler']->push(
            $this->appendRequest()
        );

        $this->http = new Client($config);
    }

    /**
     * Guzzle post request
     * 
     * @param string $uri
     * @param mixed $data
     * @param array $headers
     * 
     * @return void
     */
    public function post(string $uri, $data, $headers = [])
    {
        $payload = [static::JSON_PARAMS => $data];
        if (isset($headers)) {
            $payload['headers'] = $headers;
        }
        try {
            return $this->http->request('post', $uri, $payload);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Guzzle post for authorization bearer token
     * 
     * @param string $token
     * @param mixed $data
     * @param array $headers
     * 
     * @return void
     */
    public function postToken(string $uri, $data, $headers = [])
    {
        $payload = [static::FORM_PARAMS => $data];
        if (isset($headers)) {
            $payload['headers'] = $headers;
        }
        try {
            return $this->http->request('post', $uri, $payload);
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