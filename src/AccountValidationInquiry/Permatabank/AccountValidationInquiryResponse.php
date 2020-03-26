<?php

namespace Assetku\BankService\AccountValidationInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryResponseContract;

class AccountValidationInquiryResponse extends BaseResponse implements AccountValidationInquiryResponseContract
{
    /**
     * @var string
     */
    protected $validationStatus;

    /**
     * ApplicationStatusInquiryResponse constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $validationStatus
     */
    public function __construct(array $messageResponseHeader, string $validationStatus)
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

    /**
     * @inheritDoc
     */
    public function isMatch()
    {
        return $this->validationStatus === '1';
    }

    /**
     * @inheritDoc
     */
    public function isNTB()
    {
        return $this->validationStatus === '1';
    }

    /**
     * @inheritDoc
     */
    public function isNotMatch()
    {
        return $this->validationStatus === '2';
    }

    /**
     * @inheritDoc
     */
    public function isETB()
    {
        return $this->validationStatus === '2';
    }
}
