<?php

namespace Assetku\BankService\Contracts\UpdateKYCStatus;

interface UpdateKYCStatusFactoryContract
{
    /**
     * Create a new update kyc status request instance
     *
     * @param  string  $referralCode
     * @param  string  $idNumber
     * @param  bool  $isKYCSuccess
     * @return UpdateKYCStatusRequestContract
     */
    public function makeRequest(string $referralCode, string $idNumber, bool $isKYCSuccess);

    /**
     * Create a new update kyc status response instance
     *
     * @param  UpdateKYCStatusRequestContract  $request
     * @param  string  $contents
     * @return UpdateKYCStatusResponseContract
     */
    public function makeResponse(UpdateKYCStatusRequestContract $request, string $contents);
}
