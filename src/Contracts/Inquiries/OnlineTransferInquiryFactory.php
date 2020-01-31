<?php

namespace Assetku\BankService\Contracts\Inquiries;

use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequest;
use Assetku\BankService\Contracts\Transfers\OnlineTransfer;

interface OnlineTransferInquiryFactory
{
    /**
     * Create a new online transfer inquiry instance
     *
     * @param  OnlineTransferInquiryRequest  $request
     * @param  string  $contents
     * @return OnlineTransfer
     */
    public function make(OnlineTransferInquiryRequest $request, string $contents);
}
