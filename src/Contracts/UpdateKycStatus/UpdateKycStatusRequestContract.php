<?php

namespace Assetku\BankService\Contracts\UpdateKYCStatus;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface UpdateKYCStatusRequestContract extends BaseRequestContract
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
     * Get update kyc status request's KYC status
     *
     * @return string
     */
    public function KYCStatus();
}
