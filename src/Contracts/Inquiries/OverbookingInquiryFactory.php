<?php

namespace Assetku\BankService\Contracts\Inquiries;

use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequest;

interface OverbookingInquiryFactory
{
    /**
     * Create a new overbooking inquiry instance
     *
     * @param  OverbookingInquiryRequest  $request
     * @param  string  $contents
     * @return OverbookingInquiry
     */
    public function make(OverbookingInquiryRequest $request, string $contents);
}
