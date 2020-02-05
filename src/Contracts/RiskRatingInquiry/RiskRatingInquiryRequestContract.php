<?php

namespace Assetku\BankService\Contracts\RiskRatingInquiry;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface RiskRatingInquiryRequestContract extends BaseRequestContract
{
    /**
     * Get risk rating inquiry request's id number
     *
     * @return string
     */
    public function idNumber();

    /**
     * Get risk rating inquiry request's employment type
     *
     * @return string
     */
    public function employmentType();

    /**
     * Get risk rating inquiry request's economy sector
     *
     * @return string
     */
    public function economySector();

    /**
     * Get risk rating inquiry request's position
     *
     * @return string
     */
    public function position();
}
