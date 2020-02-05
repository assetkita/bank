<?php

namespace Assetku\BankService\AccountValidationInquiry\Permatabank;

use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryFactoryContract;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryRequestContract;

class AccountValidationInquiryFactory implements AccountValidationInquiryFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(
        string $accountNumber,
        string $idNumber,
        string $handPhoneNumber,
        string $customerName,
        string $dateOfBirth,
        string $cityOfBirth
    ) {
        return new AccountValidationInquiryRequest(
            $accountNumber,
            $idNumber,
            $handPhoneNumber,
            $customerName,
            $dateOfBirth,
            $cityOfBirth
        );
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(AccountValidationInquiryRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['InquiryAccountValidationRs'];

        $applicationInfo = $response['ApplicationInfo'];

        return new AccountValidationInquiryResponse($response['MsgRsHdr'], $applicationInfo['ValidationStatus'] === '1');
    }
}
