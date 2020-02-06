<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData;

use Assetku\BankService\Contracts\Subjects\SubmitApplicationDataSubject;

interface SubmitApplicationDataFactoryContract
{
    /**
     * Create a new submit application data request instance
     *
     * @param  SubmitApplicationDataSubject  $subject
     * @return SubmitApplicationDataRequestContract
     */
    public function makeRequest(SubmitApplicationDataSubject $subject);

    /**
     * Create a new submit application data response instance
     *
     * @param  SubmitApplicationDataRequestContract  $request
     * @param  string  $contents
     * @return SubmitApplicationDataResponseContract
     */
    public function makeResponse(SubmitApplicationDataRequestContract $request, string $contents);
}
