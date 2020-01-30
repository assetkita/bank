<?php

namespace Assetku\BankService\Requests\Contracts\Factories;

use Assetku\BankService\Requests\Contracts\OverbookingInquiryRequest;

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
