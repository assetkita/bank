<?php

namespace Assetku\BankService\ApplicationStatusInquiry\Permatabank;

use Assetku\BankService\ApplicationStatusInquiry\ApplicationStatusProduct;
use Assetku\BankService\Base\Permatabank\BaseResponse;

class ApplicationStatusInquiryResponse extends BaseResponse
{
    /**
     * @var string
     */
    protected $refferalCode;

    /**
     * ApplicationStatusInquiryResponse constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $refferalCode
     * @param  ApplicationStatusProduct  $applicationStatusProducts
     */
    public function __construct(array $messageResponseHeader, string $refferalCode, $applicationStatusProducts)
    {
        parent::__construct($messageResponseHeader);

        $this->refferalCode = $refferalCode;
    }

    /**
     * @inheritDoc
     */
    public function refferalCode()
    {
        return $this->refferalCode;
    }
}
