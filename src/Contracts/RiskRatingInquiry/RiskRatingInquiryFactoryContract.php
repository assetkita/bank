<?php

namespace Assetku\BankService\Contracts\RiskRatingInquiry;

interface RiskRatingInquiryFactoryContract
{
    /**
     * Create a new risk rating inquiry request instance
     *
     * @param  string  $idNumber
     * @param  string  $employmentType
     * @param  string  $economySector
     * @param  string  $position
     * @return RiskRatingInquiryRequestContract
     */
    public function makeRequest(string $idNumber, string $employmentType, string $economySector, string $position);

    /**
     * Create a new risk rating inquiry response instance
     *
     * @param  RiskRatingInquiryRequestContract  $request
     * @param  string  $contents
     * @return RiskRatingInquiryResponseContract
     */
    public function makeResponse(RiskRatingInquiryRequestContract $request, string $contents);
}
