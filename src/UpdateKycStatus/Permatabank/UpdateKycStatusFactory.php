<?php

namespace Assetku\BankService\UpdateKYCStatus\Permatabank;

use Assetku\BankService\Contracts\UpdateKYCStatus\UpdateKYCStatusFactoryContract;
use Assetku\BankService\Contracts\UpdateKYCStatus\UpdateKYCStatusRequestContract;

class UpdateKYCStatusFactory implements UpdateKYCStatusFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(string $referralCode, string $idNumber, bool $isKYCSuccess)
    {
        $KYCStatus = $isKYCSuccess ? '00' : '01';

        return new UpdateKYCStatusRequest($referralCode, $idNumber, $KYCStatus);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(UpdateKYCStatusRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['UpdateKycFlagRs'];

        return new UpdateKYCStatusResponse($response['MsgRsHdr']);
    }
}
