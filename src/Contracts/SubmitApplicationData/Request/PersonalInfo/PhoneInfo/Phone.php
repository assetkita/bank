<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\PhoneInfo;

interface Phone
{
    /**
     * Get phone's phone type
     *
     * @return string
     */
    public function phoneType();

    /**
     * Get phone's phone area code
     *
     * @return string
     */
    public function phoneAreaCode();

    /**
     * Get phone's phone number
     *
     * @return string
     */
    public function phoneNumber();

    /**
     * Get phone's phone extension
     *
     * @return string
     */
    public function phoneExtension();
}
