<?php

namespace Assetku\BankService\Contracts\StatusTransactionInquiry;

interface StatusTransactionInquiryFactoryContract
{
    /**
     * Create a new status transaction inquiry request instance
     *
     * @param  string  $customerReferralId
     * @return StatusTransactionInquiryRequestContract
     */
    public function makeRequest(string $customerReferralId);

    /**
     * Create a new status transaction inquiry response instance
     *
     * @param  StatusTransactionInquiryRequestContract  $request
     * @param  string  $contents
     * @return StatusTransactionInquiryResponseContract
     */
    public function makeResponse(StatusTransactionInquiryRequestContract $request, string $contents);
}
