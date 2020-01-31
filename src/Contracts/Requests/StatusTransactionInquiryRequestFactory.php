<?php

namespace Assetku\BankService\Contracts\Requests;

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
