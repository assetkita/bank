<?php

namespace Assetku\BankService\Overbooking\Permatabank;

use Assetku\BankService\Contracts\Overbooking\OverbookingFactoryContract;
use Assetku\BankService\Contracts\Overbooking\OverbookingRequestContract;
use Assetku\BankService\Contracts\Subjects\OverbookingSubject;

class OverbookingFactory implements OverbookingFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(OverbookingSubject $subject)
    {
        return new OverbookingRequest($subject);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(OverbookingRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['XferAddRs'];

        return new OverbookingResponse($response['MsgRsHdr'], $response['TrxReffNo']);
    }
}
