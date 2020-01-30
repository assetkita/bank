<?php

namespace Assetku\BankService\Requests\Contracts;

interface BalanceInquiryRequest extends Request
{
    /**
     * Get balance inquiry request's account number
     *
     * @return string
     */
    public function accountNumber();
}
