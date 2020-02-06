<?php

namespace Assetku\BankService\AccountValidationInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryResponseContract;

class AccountValidationInquiryResponse extends BaseResponse implements AccountValidationInquiryResponseContract
{
    /**
     * @var bool
     */
    protected $validationStatus;

    /**
     * ApplicationStatusInquiryResponse constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  bool  $validationStatus
     */
    public function __construct(array $messageResponseHeader, bool $validationStatus)
    {
        parent::__construct($messageResponseHeader);

        $this->validationStatus = $validationStatus;
    }

    /**
     * @inheritDoc
     */
    public function validationStatus()
    {
        return $this->validationStatus;
    }
}
