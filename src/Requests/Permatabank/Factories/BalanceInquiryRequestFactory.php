<?php

namespace Assetku\BankService\Requests\Permatabank\Factories;

use Assetku\BankService\Requests\Contracts\Factories\BalanceInquiryRequestFactory as BalanceInquiryRequestFactoryContract;
use Assetku\BankService\Requests\Permatabank\BalanceInquiryRequest;

class BalanceInquiryRequestFactory implements BalanceInquiryRequestFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(string $accountNumber)
    {
        return new BalanceInquiryRequest($accountNumber);
    }
}
