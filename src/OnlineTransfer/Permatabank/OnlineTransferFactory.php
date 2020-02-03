<?php

namespace Assetku\BankService\OnlineTransfer\Permatabank;

use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferFactoryContract;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferRequestContract;
use Assetku\BankService\Contracts\Subjects\OnlineTransferSubject;

class OnlineTransferFactory implements OnlineTransferFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(OnlineTransferSubject $subject)
    {
        return new OnlineTransferRequest($subject);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(OnlineTransferRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['OlXferAddRs'];

        return new OnlineTransferResponse($response['MsgRsHdr'], $response['TrxReffNo']);
    }
}
