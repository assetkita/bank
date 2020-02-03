<?php

namespace Assetku\BankService\SubmitApplicationDocument\Permatabank;

use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentRequestContract;

class SubmitApplicationDocumentFactory implements SubmitApplicationDocumentFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(array $data)
    {
        return new SubmitApplicationDocumentRequest($data);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(SubmitApplicationDocumentRequestContract $request, string $contents)
    {
        $data = json_decode($content, true);

        $response = $data['SubmitDocumentRs'];

        return new SubmitApplicationDocumentResponse($response['MsgRsHdr']);
    }
}
