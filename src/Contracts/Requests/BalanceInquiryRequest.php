<?php

namespace Assetku\BankService\Contracts\Requests;

interface BalanceInquiryRequest extends Request
{
    /**
     * Get balance inquiry request's toAccount number
     *
     * @return string
     */
    public function accountNumber();
}
