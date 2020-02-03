<?php

namespace Assetku\BankService\OverbookingInquiry\Permatabank;

use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryFactoryContract;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryRequestContract;

class OverbookingInquiryFactory implements OverbookingInquiryFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(string $accountNumber)
    {
        return new OverbookingInquiryRequest($accountNumber);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(OverbookingInquiryRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['AcctInqRs'];

        $inquiryInfo = $response['InqInfo'];

        return new OverbookingInquiryResponse(

            $response['MsgRsHdr'],
            $inquiryInfo['AccountNumber'],
            $inquiryInfo['AccountName']
        );
    }
}
