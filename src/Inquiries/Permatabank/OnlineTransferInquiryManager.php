<?php

namespace Assetku\BankService\Inquiries\Permatabank;

use Assetku\BankService\Contracts\Inquiries\OnlineTransferInquiryFactory;
use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequest;

class OnlineTransferInquiryManager implements OnlineTransferInquiryFactory
{
    /**
     * @inheritDoc
     */
    public function make(OnlineTransferInquiryRequest $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['OlXferInqRs'];

        $transferInfo = $response['XferInfo'];

        return new OnlineTransferInquiry(
            $response['MsgRsHdr'],
            $response['TrxReffNo'],
            $transferInfo['ToAccount'],
            $transferInfo['ToAccountFullName'],
            $transferInfo['BankId'],
            $transferInfo['BankName']
        );
    }
}
