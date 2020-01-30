<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Requests\Contracts\Request as RequestContract;

abstract class Request implements RequestContract
{
    /**
     * @var string
     */
    protected $customerReferenceId;

    /**
     * @var string
     */
    protected $timestamp;

    /**
     * Request constructor.
     *
     */
    public function __construct()
    {
        $this->timestamp = now()->format('Y-m-d\TH:i:s\.vP');

        $this->customerReferenceId = random_alphanumeric();
    }

    /**
     * Get request's timestamp
     *
     * @return string
     */
    public function timestamp()
    {
        return $this->timestamp;
    }
}
