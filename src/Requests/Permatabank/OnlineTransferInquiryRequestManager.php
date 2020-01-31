<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequestFactory;

class OnlineTransferInquiryRequestManager implements OnlineTransferInquiryRequestFactory
{
    /**
     * @inheritDoc
     */
    public function make(string $toAccount, string $bankId, string $bankName)
    {
        return new OnlineTransferInquiryRequest($toAccount, $bankId, $bankName);
    }
}
