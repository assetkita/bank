<?php

namespace Assetku\BankService\Contracts\Requests;

interface OverbookingInquiryRequest extends Request
{
    /**
     * Get overbooking inquiry request's toAccount number
     *
     * @return string
     */
    public function accountNumber();
}
