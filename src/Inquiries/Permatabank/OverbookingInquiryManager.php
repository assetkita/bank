<?php

namespace Assetku\BankService\Inquiries\Permatabank;

use Assetku\BankService\Contracts\Inquiries\OverbookingInquiryFactory;
use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequest;

class OverbookingInquiryManager implements OverbookingInquiryFactory
{
    /**
     * @inheritDoc
     */
    public function make(OverbookingInquiryRequest $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['AcctInqRs'];

        $inquiryInfo = $response['InqInfo'];

        return new OverbookingInquiry(
            $response['MsgRsHdr'],
            $inquiryInfo['AccountNumber'],
            $inquiryInfo['AccountName']
        );
    }
}
