<?php

namespace Assetku\BankService\Contracts;

interface BalanceInquirySubject
{
    /**
     * Get balance inquiry's account number
     *
     * @return string
     */
    public function balanceInquiryAccountNumber();
}
