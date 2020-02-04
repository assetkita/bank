<?php

namespace Assetku\BankService\Contracts\ApplicationStatusInquiry;

interface ApplicationStatusInquiryFactoryContract
{
    /**
     * Create a new inquiry application status request instance
     *
     * @param  array $data
     * @return ApplicationStatusInquiryRequestContract
     */
    public function makeRequest(array $data);

    /**
     * Create a new inquiry application status response instance
     *
     * @param  ApplicationStatusInquiryRequestContract  $request
     * @param  string  $contents
     * @return ApplicationStatusInquiryResponseContract
     */
    public function makeResponse(ApplicationStatusInquiryRequestContract $request, string $contents);
}