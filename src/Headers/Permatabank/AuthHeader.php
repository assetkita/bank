<?php

namespace Assetku\BankService\Headers\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseHeader;
use Assetku\BankService\Contracts\HeaderContract;
use Assetku\BankService\Contracts\Base\BaseRequestContract;

class AuthHeader extends BaseHeader implements HeaderContract
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
     * @param  BaseRequestContract  $request
     */
    public function __construct(BaseRequestContract $request)
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
