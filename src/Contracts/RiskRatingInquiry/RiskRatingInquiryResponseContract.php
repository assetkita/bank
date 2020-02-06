<?php

namespace Assetku\BankService\Contracts\RiskRatingInquiry;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface RiskRatingInquiryResponseContract extends BaseResponseContract
{
    /**
     * Get risk rating inquiry response's risk status
     *
     * @return string
     */
    public function riskStatus();

    /**
     * Get risk rating inquiry response's risk status description
     *
     * @return string
     */
    public function riskStatusDescription();
}
