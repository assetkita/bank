<?php

namespace Assetku\BankService\BalanceInquiry\Permatabank;

use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryFactoryContract;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryRequestContract;

class BalanceInquiryFactory implements BalanceInquiryFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(string $accountNumber)
    {
        return new BalanceInquiryRequest($accountNumber);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(BalanceInquiryRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['BalInqRs'];

        $inquiryInfo = $response['InqInfo'];

        return new BalanceInquiryResponse(
            $response['MsgRsHdr'],
            $inquiryInfo['AccountNumber'],
            $inquiryInfo['AccountCurrency'],
            $inquiryInfo['AccountBalanceAmount'],
            $inquiryInfo['BalanceType']
        );
    }
}
