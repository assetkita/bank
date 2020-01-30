<?php

namespace Assetku\BankService\Requests\Permatabank\Headers;

use Assetku\BankService\Requests\Permatabank\Headers\Contracts\Header as HeaderContract;
use Illuminate\Support\Collection;

class CommonHeader extends Header implements HeaderContract
{
    /**
     * @inheritDoc
     */
    public function make()
    {
        $accessToken = \BankService::accessToken();

        return [
            'Authorization'     => "Bearer {$accessToken}",
            'permata-signature' => $this->signature(),
            'organizationname'  => $this->organizationName,
            'permata-timestamp' => $this->request->timestamp(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function signature()
    {
        $accessToken = \BankService::accessToken();

        $data = Collection::make($this->request->data())->recursiveTrim()->toArray();

        $payload = $this->request->encoder()->encode($data);

        $data = "{$accessToken}:{$this->request->timestamp()}:{$payload}";

        return base64_encode(hash_hmac('sha256', $data, $this->staticKey, true));
    }
}
