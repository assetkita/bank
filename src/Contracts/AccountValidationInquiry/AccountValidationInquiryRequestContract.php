<?php

namespace Assetku\BankService\Contracts\AccountValidationInquiry;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface AccountValidationInquiryRequestContract extends BaseRequestContract
{
    /**
     * Get account validation inquiry request's account number
     *
     * @return string
     */
    public function accountNumber();

    /**
     * Get account validation inquiry request's id number
     *
     * @return string
     */
    public function idNumber();

    /**
     * Get account validation inquiry request's hand phone number
     *
     * @return string
     */
    public function handPhoneNumber();

    /**
     * Get account validation inquiry request's customer name
     *
     * @return string
     */
    public function customerName();

    /**
     * Get account validation inquiry request's date of birth
     *
     * @return string
     */
    public function dateOfBirth();

    /**
     * Get account validation inquiry request's city of birth
     *
     * @return string
     */
    public function cityOfBirth();
}
