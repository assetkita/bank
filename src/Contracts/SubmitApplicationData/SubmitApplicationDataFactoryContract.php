<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData;

interface SubmitApplicationDataFactoryContract
{
    /**
     * Create a new submit application data request instance
     *
     * @param  array $data
     * @return SubmitApplicationDataRequestContract
     */
    public function makeRequest(array $data);

    /**
     * Create a new submit application data response instance
     *
     * @param  SubmitApplicationDataRequestContract  $request
     * @param  string  $contents
     * @return SubmitApplicationDataResponseContract
     */
    public function makeResponse(SubmitApplicationDataRequestContract $request, string $contents);
}
