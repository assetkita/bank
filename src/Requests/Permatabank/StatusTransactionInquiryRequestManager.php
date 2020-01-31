<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequestFactory;

class StatusTransactionInquiryRequestManager implements StatusTransactionInquiryRequestFactory
{
    /**
     * @inheritDoc
     */
    public function make(string $customerReferenceId)
    {
        return new StatusTransactionInquiryRequest($customerReferenceId);
    }
}
