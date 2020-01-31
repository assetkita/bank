<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Requests\RtgsTransferRequest;
use Assetku\BankService\Contracts\Transfers\RtgsTransferFactory;

class RtgsTransferManager implements RtgsTransferFactory
{
    /**
     * @inheritDoc
     */
    public function make(RtgsTransferRequest $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['RtgsXferAddRs'];

        return new RtgsTransfer($response['MsgRsHdr'], $response['TrxReffNo']);
    }
}
