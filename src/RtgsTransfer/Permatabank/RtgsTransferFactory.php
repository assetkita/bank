<?php

namespace Assetku\BankService\RtgsTransfer\Permatabank;

use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferFactoryContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferRequestContract;
use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;

class RtgsTransferFactory implements RtgsTransferFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(RtgsTransferSubject $subject)
    {
        return new RtgsTransferRequest($subject);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(RtgsTransferRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['RtgsXferAddRs'];

        return new RtgsTransferResponse($response['MsgRsHdr'], $response['TrxReffNo']);
    }
}
