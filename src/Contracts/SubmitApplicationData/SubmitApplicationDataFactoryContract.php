<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData;

use Assetku\BankService\Contracts\Subjects\SubmitFintechAccountSubject;

interface SubmitApplicationDataFactoryContract
{
    /**
     * Create a new fintech account request instance
     *
     * @param  array $data
     * @return SubmitApplicationDataRequestContract
     */
    public function makeRequest(array $data);

    /**
     * Create a new fintech account response instance
     *
     * @param  SubmitApplicationDataRequestContract  $request
     * @param  string  $contents
     * @return SubmitApplicationDataResponseContract
     */
    public function makeResponse(SubmitApplicationDataRequestContract $request, string $contents);
}
