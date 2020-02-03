<?php

namespace Assetku\BankService\Base\Permatabank;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

abstract class BaseRequest implements BaseRequestContract
{
    /**
     * @var string
     */
    protected $customerReferralId;

    /**
     * @var string
     */
    protected $timestamp;

    /**
     * BaseRequest constructor.
     */
    public function __construct()
    {
        $this->customerReferralId = random_alphanumeric();

        $this->timestamp = now()->format('Y-m-d\TH:i:s\.vP');
    }

    /**
     * @inheritDoc
     */
    public function timestamp()
    {
        return $this->timestamp;
    }

    /**
     * @inheritDoc
     */
    public function method()
    {
        return 'POST';
    }
}
