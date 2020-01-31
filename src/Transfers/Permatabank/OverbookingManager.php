<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Requests\OverbookingRequest;
use Assetku\BankService\Contracts\Transfers\OverbookingFactory;

class OverbookingManager implements OverbookingFactory
{
    /**
     * @inheritDoc
     */
    public function make(OverbookingRequest $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['XferAddRs'];

        return new Overbooking($response['MsgRsHdr'], $response['TrxReffNo']);
    }
}
