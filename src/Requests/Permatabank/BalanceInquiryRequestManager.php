<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\BalanceInquiryRequestFactory;

class BalanceInquiryRequestManager implements BalanceInquiryRequestFactory
{
    /**
     * @inheritDoc
     */
    public function make(string $accountNumber)
    {
        return new BalanceInquiryRequest($accountNumber);
    }
}
