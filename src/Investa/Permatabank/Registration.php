<?php

namespace Assetku\BankService\Investa\Permatabank;

class Registration
{
    /**
     * @var string $timestamp
     */
    protected $timestamp;

    /**
     * @var string $custRefID
     */
    protected $custRefID;

    /**
     * @var string $statusCode
     */
    protected $statusCode;

    /**
     * @var string $statusDesc
     */
    protected $statusDesc;

    /**
     * @var string $reffCode
     */
    protected $reffCode;

    /**
     * init
     * 
     * @param object $registration
     */
    public function __construct($registration)
    {
        $this->timestamp = $registration->SubmitApplicationRs->MsgRsHdr->ResponseTimestamp;

        $this->custRefID = $registration->SubmitApplicationRs->MsgRsHdr->CustRefID;

        $this->statusCode = $registration->SubmitApplicationRs->MsgRsHdr->StatusCode;

        $this->statusDesc = $registration->SubmitApplicationRs->MsgRsHdr->StatusDesc;

        $this->reffCode = $registration->SubmitApplicationRs->ApplicationInfo->ReffCode;
    }

    /**
     * get time stamp
     * 
     * @return string $timestamp
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * get customer ref id
     * 
     * @return string $custRefID
     */
    public function getCustomerReferenceId()
    {
        return $this->custRefID;
    }

    /**
     * get status code
     * 
     * @return string $statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * get status description
     * 
     * @return string $statusDesc
     */
    public function getStatusDescription()
    {
        return $this->statusDesc;
    }

    /**
     * get reff code
     * 
     * @return string $reffCode
     */
    public function getReffCode()
    {
        return $this->reffCode;
    }
}
