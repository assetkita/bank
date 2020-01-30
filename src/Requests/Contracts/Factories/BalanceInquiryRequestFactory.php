<?php

namespace Assetku\BankService\Requests\Contracts\Factories;

use Assetku\BankService\Requests\Contracts\BalanceInquiryRequest;

interface BalanceInquiryRequestFactory
{
    /**
     * Create a new balance inquiry request instance
     *
     * @param  string  $accountNumber
     * @return BalanceInquiryRequest
     */
    public function make(string $accountNumber);
}
