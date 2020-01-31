<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Requests\OnlineTransferRequest;
use Assetku\BankService\Contracts\Transfers\OnlineTransferFactory;

class OnlineTransferManager implements OnlineTransferFactory
{
    /**
     * @inheritDoc
     */
    public function make(OnlineTransferRequest $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['OlXferAddRs'];

        return new LlgTransfer($response['MsgRsHdr'], $response['TrxReffNo']);
    }
}
