<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;

interface KycOption
{
    /**
     * Get kyc options' kyc type
     *
     * @return string
     */
    public function kycType();

    /**
     * Get kyc options' kyc status
     *
     * @return string
     */
    public function kycStatus();

    /**
     * Get kyc options' additional data
     *
     * @return string
     */
    public function additionalData();
}
