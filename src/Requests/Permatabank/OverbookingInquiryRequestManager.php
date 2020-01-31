<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequestFactory;

class OverbookingInquiryRequestManager implements OverbookingInquiryRequestFactory
{
    /**
     * @inheritDoc
     */
    public function make(string $accountNumber)
    {
        return new OverbookingInquiryRequest($accountNumber);
    }
}
