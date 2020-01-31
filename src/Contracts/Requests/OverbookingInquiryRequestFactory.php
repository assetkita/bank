<?php

namespace Assetku\BankService\Contracts\Requests;

interface OverbookingInquiryRequestFactory
{
    /**
     * Create a new overbooking inquiry request instance
     *
     * @param  string  $accountNumber
     * @return OverbookingInquiryRequest
     */
    public function make(string $accountNumber);
}
