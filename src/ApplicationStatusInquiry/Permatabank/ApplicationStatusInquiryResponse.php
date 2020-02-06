<?php

namespace Assetku\BankService\ApplicationStatusInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryResponseContract;

class ApplicationStatusInquiryResponse extends BaseResponse implements ApplicationStatusInquiryResponseContract
{
    /**
     * @var string
     */
    protected $referralCode;

    /**
     * @var array
     */
    protected $applicationStatusProducts;

    /**
     * ApplicationStatusInquiryResponse constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $referralCode
     * @param  array  $applicationStatusProducts
     */
    public function __construct(array $messageResponseHeader, string $referralCode, array $applicationStatusProducts)
    {
        parent::__construct($messageResponseHeader);

        $this->referralCode = $referralCode;

        $this->applicationStatusProducts = $applicationStatusProducts;
    }

    /**
     * @inheritDoc
     */
    public function referralCode()
    {
        return $this->referralCode;
    }

    /**
     * @inheritDoc
     */
    public function applicationStatusProducts()
    {
        return $this->applicationStatusProducts;
    }
}
