<?php

namespace Assetku\BankService\Contracts\UpdateKycStatus;

interface UpdateKycStatusFactoryContract
{
    /**
     * Create a new update kyc status request instance
     *
     * @param  string  $referralCode
     * @param  string  $idNumber
     * @param  string  $kycStatus
     * @return UpdateKycStatusRequestContract
     */
    public function makeRequest(string $referralCode, string $idNumber, string $kycStatus);

    /**
     * Create a new update kyc status response instance
     *
     * @param  UpdateKycStatusRequestContract  $request
     * @param  string  $contents
     * @return UpdateKycStatusResponseContract
     */
    public function makeResponse(UpdateKycStatusRequestContract $request, string $contents);
}
