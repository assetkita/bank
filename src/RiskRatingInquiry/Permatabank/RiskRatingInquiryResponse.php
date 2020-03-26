<?php

namespace Assetku\BankService\RiskRatingInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryResponseContract;

class RiskRatingInquiryResponse extends BaseResponse implements RiskRatingInquiryResponseContract
{
    /**
     * @var string
     */
    protected $riskStatus;

    /**
     * @var string
     */
    protected $riskStatusDescription;

    /**
     * RiskRatingInquiryResponse constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $riskStatus
     * @param  string  $riskStatusDescription
     */
    public function __construct(array $messageResponseHeader, string $riskStatus, string $riskStatusDescription)
    {
        parent::__construct($messageResponseHeader);

        $this->riskStatus = $riskStatus;

        $this->riskStatusDescription = $riskStatusDescription;
    }

    /**
     * @inheritDoc
     */
    public function riskStatus()
    {
        return $this->riskStatus;
    }

    /**
     * @inheritDoc
     */
    public function riskStatusDescription()
    {
        return $this->riskStatusDescription;
    }

    /**
     * @inheritDoc
     */
    public function isMediumRisk()
    {
        return $this->riskStatus() === '1';
    }

    /**
     * @inheritDoc
     */
    public function isHighRisk()
    {
        return $this->riskStatus() === '2';
    }
}
