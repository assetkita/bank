<?php

namespace Assetku\BankService\OnlineTransferInquiry\Permatabank;

use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryFactoryContract;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryRequestContract;

class OnlineTransferInquiryFactory implements OnlineTransferInquiryFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(string $toAccount, string $bankId, string $bankName)
    {
        return new OnlineTransferInquiryRequest($toAccount, $bankId, $bankName);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(OnlineTransferInquiryRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['OlXferInqRs'];

        $transferInfo = $response['XferInfo'];

        return new OnlineTransferInquiryResponse(
            $response['MsgRsHdr'],
            $response['TrxReffNo'],
            $transferInfo['ToAccount'],
            $transferInfo['ToAccountFullName'],
            $transferInfo['BankId'],
            $transferInfo['BankName']
        );
    }
}
