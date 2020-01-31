<?php

namespace Assetku\BankService\Requests\Permatabank;

abstract class Request
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
     */
    public function __construct()
    {
        $this->customerReferenceId = random_alphanumeric();

        $this->timestamp = now()->format('Y-m-d\TH:i:s\.vP');
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
