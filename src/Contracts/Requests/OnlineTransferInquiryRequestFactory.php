<?php

namespace Assetku\BankService\Contracts\Requests;

interface OnlineTransferInquiryRequestFactory
{
    /**
     * Create a new online transfer inquiry request instance
     *
     * @param  string  $toAccount
     * @param  string  $bankId
     * @param  string  $bankName
     * @return OnlineTransferInquiryRequest
     */
    public function make(string $toAccount, string $bankId, string $bankName);
}
