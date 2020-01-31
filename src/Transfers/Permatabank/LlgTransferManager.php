<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Requests\LlgTransferRequest;
use Assetku\BankService\Contracts\Transfers\LlgTransferFactory;

class LlgTransferManager implements LlgTransferFactory
{
    /**
     * @inheritDoc
     */
    public function make(LlgTransferRequest $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['LlgXferAddRs'];

        return new LlgTransfer($response['MsgRsHdr'], $response['TrxReffNo']);
    }
}
