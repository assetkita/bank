<?php

namespace Assetku\BankService\RiskRatingInquiry\Permatabank;

use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryFactoryContract;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryRequestContract;

class RiskRatingInquiryFactory implements RiskRatingInquiryFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(string $idNumber, string $employmentType, string $economySector, string $position)
    {
        return new RiskRatingInquiryRequest($idNumber, $employmentType, $economySector, $position);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(RiskRatingInquiryRequestContract $request, string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['InquiryHighRiskRs'];

        $applicationInfo = $response['ApplicationInfo'];

        return new RiskRatingInquiryResponse(
            $response['MsgRsHdr'],
            $applicationInfo['RiskStatus'],
            $applicationInfo['RiskStatusDesc']
        );
    }
}
