<?php

namespace Assetku\BankService\Contracts\ApplicationStatusInquiry;

interface ApplicationStatusInquiryFactoryContract
{
    /**
     * Create a new application status inquiry request instance
     *
     * @param  string  $referralCode
     * @return ApplicationStatusInquiryRequestContract
     */
    public function makeRequest(string $referralCode);

    /**
     * Create a new application status inquiry response instance
     *
     * @param  ApplicationStatusInquiryRequestContract  $request
     * @param  string  $contents
     * @return ApplicationStatusInquiryResponseContract
     */
    public function makeResponse(ApplicationStatusInquiryRequestContract $request, string $contents);
}
