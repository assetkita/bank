<?php

namespace Assetku\BankService\Requests\Permatabank\Factories;

use Assetku\BankService\Requests\Contracts\Factories\OverbookingInquiryRequestFactory as OverbookingInquiryRequestFactoryContract;
use Assetku\BankService\Requests\Permatabank\OverbookingInquiryRequest;

class OverbookingInquiryRequestFactory implements OverbookingInquiryRequestFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(string $accountNumber)
    {
        return new OverbookingInquiryRequest($accountNumber);
    }
}
