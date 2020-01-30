<?php

namespace Assetku\BankService\Requests\Contracts;

interface OverbookingInquiryRequest extends Request
{
    /**
     * Get overbooking inquiry request's account number
     *
     * @return string
     */
    public function accountNumber();
}
