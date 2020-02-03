<?php

namespace Assetku\BankService\Contracts\StatusTransactionInquiry;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface StatusTransactionInquiryRequestContract extends BaseRequestContract
{
    /**
     * Get status transaction inquiry request's customer referral id
     *
     * @return string
     */
    public function customerReferralId();
}
