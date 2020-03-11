<?php

namespace Assetku\BankService\Headers\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseHeader;
use Assetku\BankService\Contracts\Base\BaseRequestContract;
use Assetku\BankService\Contracts\HeaderInterface;
use Illuminate\Support\Collection;

class CommonHeader extends BaseHeader implements HeaderInterface
{
    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var string
     */
    protected $instcode;

    /**
     * @var string
     */
    protected $groupId;

    /**
     * CommonHeader constructor.
     *
     * @param  BaseRequestContract  $request
     */
    public function __construct(BaseRequestContract $request)
    {
        $environment = \App::environment('production') ? 'production' : 'development';

        parent::__construct($request);

        $this->instcode = \Config::get('bank.providers.permatabank.instcode');

        $this->groupId = \Config::get("bank.providers.permatabank.{$environment}.group_id");

        $this->accessToken = \BankService::accessToken();
    }

    /**
     * @inheritDoc
     */
    public function content()
    {
        return [
            'Authorization'     => "Bearer {$this->accessToken}",
            'permata-signature' => $this->signature(),
            'organizationname'  => $this->groupId,
            'permata-timestamp' => $this->request->timestamp(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function signature()
    {
        $trimmedData = Collection::make($this->request->data())->recursiveTrim()->toArray();

        $payload = $this->request->encoder()->encode($trimmedData);

        $data = "{$this->accessToken}:{$this->request->timestamp()}:{$payload}";

        return base64_encode(hash_hmac('sha256', $data, $this->staticKey, true));
    }
}
