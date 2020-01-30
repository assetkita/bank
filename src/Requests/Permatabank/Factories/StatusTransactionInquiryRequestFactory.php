<?php

namespace Assetku\BankService\Requests\Permatabank\Factories;

use Assetku\BankService\Requests\Contracts\Factories\StatusTransactionInquiryRequestFactory as StatusTransactionInquiryRequestFactoryContract;
use Assetku\BankService\Requests\Permatabank\StatusTransactionInquiryRequest;

class StatusTransactionInquiryRequestFactory implements StatusTransactionInquiryRequestFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(string $customerReferenceId)
    {
        return new StatusTransactionInquiryRequest($customerReferenceId);
    }
}
