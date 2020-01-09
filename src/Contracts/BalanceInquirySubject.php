<?php

namespace Assetku\BankService\Contracts;

interface BalanceInquirySubject
{
    /**
     * @return string
     */
    public function accountNumber();   
}
