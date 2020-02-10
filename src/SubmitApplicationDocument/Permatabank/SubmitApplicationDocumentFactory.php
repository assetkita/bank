<?php

namespace Assetku\BankService\SubmitApplicationDocument\Permatabank;

use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentRequestContract;

class SubmitApplicationDocumentFactory implements SubmitApplicationDocumentFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(string $bankReferralId, string $url)
    {
        return new SubmitApplicationDocumentRequest($bankReferralId, $url);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(SubmitApplicationDocumentRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['SubmitAppDocNotificationRs'];

        return new SubmitApplicationDocumentResponse($response['MsgRsHdr']);
    }
}
