<?php

namespace Assetku\BankService\Investa\Permatabank\CheckRegistrationStatus;

class CheckRegistrationStatus
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
    protected $reffCode;

    /**
     * @var ApplocationStatus $applicationStatus
     */
    protected $applicationStatus;

    /**
     * init
     * 
     * @param $registrationStatus
     */
    public function __construct($registrationStatus)
    {
        $applicationInfo = $registrationStatus->InqSubmissionRs->InquiryApplicationInfo->ApplicationStatus;

        $this->custRefId = $registrationStatus->InqSubmissionRs->MsgRsHdr->CustRefID;

        $this->statusCode = $registrationStatus->InqSubmissionRs->MsgRsHdr->StatusCode;
        
        $this->statusDesc = $registrationStatus->InqSubmissionRs->MsgRsHdr->StatusDesc;

        $this->reffCode = $registrationStatus->InqSubmissionRs->InquiryApplicationInfo->ReffCode;

        if (is_array($applicationInfo)) {
            $this->applicationStatus = array_map(function($applicationStatus) {
                return new Product($applicationStatus);
            }, $applicationInfo);
        } else {
            $this->applicationStatus = [
                new Product($applicationInfo)
            ];
        }

    }

    /**
     * get customer referral id
     * 
     * @return string $custRefId
     */
    public function getCustomerReferralId()
    {
        return $this->custRefId;
    }

    /**
     * get status code
     * 
     * @return $statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * get status desc
     * 
     * @return string $statusDesc
     */
    public function getStatusDescription()
    {
        return $this->statusDesc;
    }

    /**
     * get Application Status
     * 
     * @return $applicationStatus
     */
    public function getApplicationStatus()
    {
        return $this->applicationStatus;
    }

    /**
     * get Application Status
     * 
     * @return $applicationStatus
     */
    public function getReffCode()
    {
        return $this->reffCode;
    }
}
