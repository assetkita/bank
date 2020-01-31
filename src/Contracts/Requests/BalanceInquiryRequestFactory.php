<?php

namespace Assetku\BankService\Contracts\Requests;

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
