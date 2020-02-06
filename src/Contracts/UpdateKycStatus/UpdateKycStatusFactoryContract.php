<?php

namespace Assetku\BankService\Contracts\UpdateKycStatus;

interface UpdateKycStatusFactoryContract
{
    /**
     * Create a new update kyc status request instance
     *
     * @param  array $data
     * @return UpdateKycStatusRequestContract
     */
    public function makeRequest(array $data);

    /**
     * Create a new update kyc status response instance
     *
     * @param  UpdateKycStatusRequestContract  $request
     * @param  string  $contents
     * @return UpdateKycStatusResponseContract
     */
    public function makeResponse(UpdateKycStatusRequestContract $request, string $contents);
}
