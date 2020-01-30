<?php

namespace Assetku\BankService\Requests\Contracts\Factories;

use Assetku\BankService\Requests\Contracts\StatusTransactionInquiryRequest;

interface StatusTransactionInquiryRequestFactory
{
    /**
     * Create a new status transaction inquiry request instance
     *
     * @param  string  $customerReferenceId
     * @return StatusTransactionInquiryRequest
     */
    public function make(string $customerReferenceId);
}
