<?php

namespace Assetku\BankService\Headers\Permatabank;

use Assetku\BankService\Contracts\Requests\Request;

abstract class Header
{
    /**
     * @var Request
     */
    protected $request;

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
        $this->staticKey = \Config::get('bank.providers.permatabank.static_key');

        $this->request = $request;
    }
}
