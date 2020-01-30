<?php

namespace Assetku\BankService\Requests\Contracts\Factories;

use Assetku\BankService\Requests\Contracts\OnlineTransferInquiryRequest;

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
