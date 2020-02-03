<?php

namespace Assetku\BankService\Contracts\OnlineTransferInquiry;

interface OnlineTransferInquiryFactoryContract
{
    /**
     * Create a new online transfer inquiry request instance
     *
     * @param  string  $toAccount
     * @param  string  $bankId
     * @param  string  $bankName
     * @return OnlineTransferInquiryRequestContract
     */
    public function makeRequest(string $toAccount, string $bankId, string $bankName);

    /**
     * Create a new online transfer inquiry response instance
     *
     * @param  OnlineTransferInquiryRequestContract  $request
     * @param  string  $contents
     * @return OnlineTransferInquiryResponseContract
     */
    public function makeResponse(OnlineTransferInquiryRequestContract $request, string $contents);
}
