<?php

namespace Assetku\BankService\Contracts\AccountValidationInquiry;

interface AccountValidationInquiryFactoryContract
{
    /**
     * Create a new account validation inquiry request instance
     *
     * @param  string  $accountNumber
     * @param  string  $idNumber
     * @param  string  $handPhoneNumber
     * @param  string  $customerName
     * @param  string  $dateOfBirth
     * @param  string  $cityOfBirth
     * @return AccountValidationInquiryRequestContract
     */
    public function makeRequest(
        string $accountNumber,
        string $idNumber,
        string $handPhoneNumber,
        string $customerName,
        string $dateOfBirth,
        string $cityOfBirth
    );

    /**
     * Create a new account validation inquiry response instance
     *
     * @param  AccountValidationInquiryRequestContract  $request
     * @param  string  $contents
     * @return AccountValidationInquiryResponseContract
     */
    public function makeResponse(AccountValidationInquiryRequestContract $request, string $contents);
}
