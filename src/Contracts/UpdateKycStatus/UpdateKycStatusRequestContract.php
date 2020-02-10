<?php

namespace Assetku\BankService\Contracts\UpdateKycStatus;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface UpdateKycStatusRequestContract extends BaseRequestContract
{
    /**
     * Get update kyc status request's referral code
     *
     * @return string
     */
    public function referralCode();

    /**
     * Get update kyc status request's id number
     *
     * @return string
     */
    public function idNumber();

    /**
     * Get update kyc status request's kyc status
     *
     * @return string
     */
    public function kycStatus();
}
