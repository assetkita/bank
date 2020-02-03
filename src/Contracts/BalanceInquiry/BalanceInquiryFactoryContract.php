<?php

namespace Assetku\BankService\Contracts\BalanceInquiry;

interface BalanceInquiryFactoryContract
{
    /**
     * Create a new balance inquiry request instance
     *
     * @param  string  $accountNumber
     * @return BalanceInquiryRequestContract
     */
    public function makeRequest(string $accountNumber);

    /**
     * Create a new balance inquiry response instance
     *
     * @param  BalanceInquiryRequestContract  $request
     * @param  string  $contents
     * @return BalanceInquiryResponseContract
     */
    public function makeResponse(BalanceInquiryRequestContract $request, string $contents);
}
