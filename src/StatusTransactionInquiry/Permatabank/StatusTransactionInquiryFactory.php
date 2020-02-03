<?php

namespace Assetku\BankService\StatusTransactionInquiry\Permatabank;

use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryFactoryContract;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryRequestContract;

class StatusTransactionInquiryFactory implements StatusTransactionInquiryFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(string $customerReferralId)
    {
        return new StatusTransactionInquiryRequest($customerReferralId);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(StatusTransactionInquiryRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['StatusTransactionRs'];

        return new StatusTransactionInquiryResponse($response, $response['TrxReffNo']);
    }
}
