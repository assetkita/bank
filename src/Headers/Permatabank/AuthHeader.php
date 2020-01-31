<?php

namespace Assetku\BankService\Headers\Permatabank;

use Assetku\BankService\Contracts\Header as HeaderContract;
use Assetku\BankService\Contracts\Requests\Request;

class AuthHeader extends Header implements HeaderContract
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
     * AuthHeader constructor.
     *
     * @param  Request  $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->apiKey = \Config::get('bank.providers.permatabank.api_key');

        $clientId = \Config::get('bank.providers.permatabank.client_id');

        $clientSecret = \Config::get('bank.providers.permatabank.client_secret');

        $this->authorizationKey = base64_encode("{$clientId}:{$clientSecret}");
    }

    /**
     * @inheritDoc
     */
    public function content()
    {
        return [
            'OAUTH-Signature' => $this->signature(),
            'OAUTH-Timestamp' => $this->request->timestamp(),
            'API-Key'         => $this->apiKey,
            'Authorization'   => "Basic {$this->authorizationKey}",
        ];
    }

    /**
     * @inheritDoc
     */
    public function signature()
    {
        $payload = $this->request->encoder()->encode($this->request->data());

        $data = "{$this->apiKey}:{$this->request->timestamp()}:{$payload}";

        return base64_encode(hash_hmac('sha256', $data, $this->staticKey, true));
    }
}
