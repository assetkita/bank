<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData;

use Assetku\BankService\Contracts\Base\BaseRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;

interface SubmitApplicationDataRequestContract extends BaseRequestContract
{
    /**
     * Get submit submit application data request's referral code
     *
     * @return string
     */
    public function referralCode();

    /**
     * Get submit submit application data request's personal info
     *
     * @return PersonalInfo
     */
    public function personalInfo();
}
