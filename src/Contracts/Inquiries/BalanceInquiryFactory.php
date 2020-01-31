<?php

namespace Assetku\BankService\Contracts\Inquiries;

use Assetku\BankService\Contracts\Requests\BalanceInquiryRequest;

interface BalanceInquiryFactory
{
    /**
     * Create a new balance inquiry instance
     *
     * @param  BalanceInquiryRequest  $request
     * @param  string  $contents
     * @return BalanceInquiry
     */
    public function make(BalanceInquiryRequest $request, string $contents);
}
