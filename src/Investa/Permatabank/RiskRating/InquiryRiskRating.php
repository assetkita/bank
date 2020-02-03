<?php

namespace Assetku\BankService\Investa\Permatabank\RiskRating;

class InquiryRiskRating
{
    /**
     * @var string
     */
    protected $custRefID;

    /**
     * @var string
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusDesc;

    /**
     * @var string
     */
    protected $riskStatus;

    /**
     * @var string
     */
    protected $riskStatusDesc;

    /**
     * Contrutor
     * 
     * @param object $inquiryRiskRating
     */
    public function __construct($inquiryRiskRating)
    {
        $messageHeader = $inquiryRiskRating->InquiryHighRiskRs->MsgRsHdr;

        $applicationInfo = $inquiryRiskRating->InquiryHighRiskRs->ApplicationInfo;

        $this->timestamp = $messageHeader->ResponseTimestamp;

        $this->custRefID = $messageHeader->CustRefID;

        $this->statusCode = $messageHeader->StatusCode;

        $this->statusDesc = $messageHeader->StatusDesc;

        $this->riskStatus = $applicationInfo->RiskStatus;

        $this->riskStatusDesc = $applicationInfo->RiskStatusDesc;
    }

    /**
     * GET status code
     * 
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * GET status Description
     * 
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDesc;
    }

    /**
     * GET customer referral id
     * 
     * @return string
     */
    public function getCustomerReferralId()
    {
        return $this->custRefID;
    }

    /**
     * GET Risk Status
     * 
     * @return string
     */
    public function getRiskStatus()
    {
        return $this->riskStatus;
    }

    /**
     * GET Risk Status Description
     * 
     * @return string
     */
    public function getRiskStatusDesc()
    {
        return $this->riskStatusDesc;
    }

    /**
     * GET timestamp
     * 
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
