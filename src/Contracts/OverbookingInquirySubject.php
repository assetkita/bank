<?php

namespace Assetku\BankService\Contracts;

interface OverbookingInquirySubject
{
    /**
     * Get overbooking inquiry's account number
     *
     * @return string
     */
    public function overbookingInquiryAccountNumber();
}
