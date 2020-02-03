<?php

namespace Assetku\BankService\Contracts\Overbooking;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface OverbookingResponseContract extends BaseResponseContract
{
    /**
     * Get overbooking response's transaction referral number
     *
     * @return string
     */
    public function transactionReferralNumber();
}
