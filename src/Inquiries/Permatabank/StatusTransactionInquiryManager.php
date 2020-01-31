<?php

namespace Assetku\BankService\Inquiries\Permatabank;

use Assetku\BankService\Contracts\Inquiries\StatusTransactionInquiryFactory;
use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequest;

class StatusTransactionInquiryManager implements StatusTransactionInquiryFactory
{
    /**
     * @inheritDoc
     */
    public function make(StatusTransactionInquiryRequest $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['StatusTransactionRs'];

        return new StatusTransactionInquiry($response, $response['TrxReffNo']);
    }
}
