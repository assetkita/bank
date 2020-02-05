<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface SubmitApplicationDataResponseContract extends BaseResponseContract
{
    /**
     * Get submit application data response's referral code
     *
     * @return string
     */
    public function referralCode();
}
