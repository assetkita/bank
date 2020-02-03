<?php

namespace Assetku\BankService\Contracts\StatusTransactionInquiry;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface StatusTransactionInquiryResponseContract extends BaseResponseContract
{
    /**
     * Get status transaction inquiry response's transaction referral number
     *
     * @return string
     */
    public function transactionReferralNumber();
}
