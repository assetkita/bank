<?php

namespace Assetku\BankService\Requests\Permatabank\Headers;

use Assetku\BankService\Requests\Contracts\Request;

abstract class Header
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $authorizationKey;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string
     */
    protected $instcode;

    /**
     * @var string
     */
    protected $organizationName;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string
     */
    protected $staticKey;

    /**
     * Header constructor.
     *
     * @param  Request  $request
     */
    public function __construct(Request $request)
    {
        $this->apiKey = \Config::get('bank.providers.permatabank.api_key');

        $this->clientId = \Config::get('bank.providers.permatabank.client_id');

        $this->clientSecret = \Config::get('bank.providers.permatabank.client_secret');

        $this->instcode = \Config::get('bank.providers.permatabank.instcode');

        $this->organizationName = \Config::get('bank.providers.permatabank.organization_name');

        $this->staticKey = \Config::get('bank.providers.permatabank.static_key');

        $this->request = $request;

        $this->authorizationKey = $this->makeAuthorizationKey();
    }

    /**
     * Make permata authorization key
     *
     * @return string
     */
    protected function makeAuthorizationKey()
    {
        return base64_encode("{$this->clientId}:{$this->clientSecret}");
    }
}
