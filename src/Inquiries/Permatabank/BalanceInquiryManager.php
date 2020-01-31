<?php

namespace Assetku\BankService\Inquiries\Permatabank;

use Assetku\BankService\Contracts\Inquiries\BalanceInquiryFactory;
use Assetku\BankService\Contracts\Requests\BalanceInquiryRequest;

class BalanceInquiryManager implements BalanceInquiryFactory
{
    /**
     * @inheritDoc
     */
    public function make(BalanceInquiryRequest $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['BalInqRs'];

        $inquiryInfo = $response['InqInfo'];

        return new BalanceInquiry(
            $response['MsgRsHdr'],
            $inquiryInfo['AccountNumber'],
            $inquiryInfo['AccountCurrency'],
            $inquiryInfo['AccountBalanceAmount'],
            $inquiryInfo['BalanceType']
        );
    }
}
