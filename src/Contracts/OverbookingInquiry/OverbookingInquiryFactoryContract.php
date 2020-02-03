<?php

namespace Assetku\BankService\Contracts\OverbookingInquiry;

interface OverbookingInquiryFactoryContract
{
    /**
     * Create a new overbooking inquiry request instance
     *
     * @param  string  $accountNumber
     * @return OverbookingInquiryRequestContract
     */
    public function makeRequest(string $accountNumber);

    /**
     * Create a new overbooking inquiry response instance
     *
     * @param  OverbookingInquiryRequestContract  $request
     * @param  string  $contents
     * @return OverbookingInquiryResponseContract
     */
    public function makeResponse(OverbookingInquiryRequestContract $request, string $contents);
}
