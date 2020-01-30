<?php

namespace Assetku\BankService\Requests\Permatabank\Factories;

use Assetku\BankService\Requests\Contracts\Factories\OnlineTransferInquiryRequestFactory as OnlineTransferInquiryRequestFactoryContract;
use Assetku\BankService\Requests\Permatabank\OnlineTransferInquiryRequest;

class OnlineTransferInquiryRequestFactory implements OnlineTransferInquiryRequestFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(string $toAccount, string $bankId, string $bankName)
    {
        return new OnlineTransferInquiryRequest($toAccount, $bankId, $bankName);
    }
}
