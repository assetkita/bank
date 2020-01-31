<?php

namespace Assetku\BankService\Contracts\Inquiries;

use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequest;

interface StatusTransactionInquiryFactory
{
    /**
     * Create a new status transaction inquiry instance
     *
     * @param  StatusTransactionInquiryRequest  $request
     * @param  string  $contents
     * @return StatusTransactionInquiry
     */
    public function make(StatusTransactionInquiryRequest $request, string $contents);
}
