<?php

namespace Assetku\BankService\Contracts\BalanceInquiry;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface BalanceInquiryRequestContract extends BaseRequestContract
{
    /**
     * Get balance inquiry request's account number
     *
     * @return string
     */
    public function accountNumber();
}
