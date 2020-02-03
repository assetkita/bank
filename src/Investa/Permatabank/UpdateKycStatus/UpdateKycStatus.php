<?php

namespace Assetku\BankService\Investa\Permatabank\UpdateKycStatus;

class UpdateKycStatus
{
    /**
     * @var string
     */
    protected $custRefId;
    
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
    protected $timestamp;

    /**
     * Constructor
     * 
     * @param object $updateKycResponse
     */
    public function __construct($updateKycResponse)
    {
        $this->custRefId = $updateKycResponse->UpdateKycFlagRs->MsgRsHdr->CustRefID;

        $this->statusCode = $updateKycResponse->UpdateKycFlagRs->MsgRsHdr->StatusCode;

        $this->statusDesc = $updateKycResponse->UpdateKycFlagRs->MsgRsHdr->StatusDesc;

        $this->timestamp = $updateKycResponse->UpdateKycFlagRs->MsgRsHdr->ResponseTimestamp;
    }

    /**
     * GET customer referral ID
     * 
     * @return string
     */
    public function getCustomerReferralId()
    {
        return $this->custRefId;
    }

    /**
     * GET Status Code
     * 
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * GET status description
     * 
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDesc;
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
