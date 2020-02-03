<?php

namespace Assetku\BankService\LlgTransfer\Permatabank;

use Assetku\BankService\Contracts\LlgTransfer\LlgTransferFactoryContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferRequestContract;
use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;

class LlgTransferFactory implements LlgTransferFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(LlgTransferSubject $subject)
    {
        return new LlgTransferRequest($subject);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(LlgTransferRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['LlgXferAddRs'];

        return new LlgTransferResponse($response['MsgRsHdr'], $response['TrxReffNo']);
    }
}
