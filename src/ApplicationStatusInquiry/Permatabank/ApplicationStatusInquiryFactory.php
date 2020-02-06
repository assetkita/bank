<?php

namespace Assetku\BankService\ApplicationStatusInquiry\Permatabank;

use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryFactoryContract;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryRequestContract;

class ApplicationStatusInquiryFactory implements ApplicationStatusInquiryFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(string $referralCode)
    {
        return new ApplicationStatusInquiryRequest($referralCode);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(ApplicationStatusInquiryRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['InqSubmissionRs'];

        $applicationInfo = $response['InquiryApplicationInfo'];

        return new ApplicationStatusInquiryResponse(
            $response['MsgRsHdr'],
            $applicationInfo['ReffCode'],
            $applicationInfo['ApplicationStatus']
        );
    }
}
