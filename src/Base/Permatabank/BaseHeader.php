<?php

namespace Assetku\BankService\Headers\Permatabank;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

abstract class BaseHeader
{
    /**
     * @var BaseRequestContract
     */
    protected $request;

    /**
     * @var string
     */
    protected $staticKey;

    /**
     * BaseHeader constructor.
     *
     * @param  BaseRequestContract  $request
     */
    public function __construct(BaseRequestContract $request)
    {
        $this->staticKey = \Config::get('bank.providers.permatabank.static_key');

        $this->request = $request;
    }
}
