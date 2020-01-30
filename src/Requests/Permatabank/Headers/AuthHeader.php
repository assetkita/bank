<?php

namespace Assetku\BankService\Requests\Permatabank\Headers;

use Assetku\BankService\Requests\Permatabank\Headers\Contracts\Header as HeaderContract;

class AuthHeader extends Header implements HeaderContract
{
    /**
     * @inheritDoc
     */
    public function make()
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
