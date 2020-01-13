<?php

namespace Assetku\BankService\Investa\Permatabank\AccountValidation;

class InquiryAccountValidation
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
    protected $validationStatus;

    /**
     * constructor
     * 
     * @param object $inquiryAccountValidation
     */
    public function __construct($inquiryAccountValidation)
    {
        $header = $inquiryAccountValidation->InquiryAccountValidationRs->MsgRsHdr;

        $applicationInfo = $inquiryAccountValidation->InquiryAccountValidationRs->ApplicationInfo;

        $this->custRefId = $header->CustRefID;
        
        $this->statusCode = $header->StatusCode;

        $this->statusDesc = $header->StatusDesc;

        $this->validationStatus = $applicationInfo->ValidationStatus;
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
     * GET status code
     * 
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDesc;
    }

    /**
     * GET validation status
     * 
     * @return string
     */
    public function getValidationStatus()
    {
        return $this->validationStatus;
    }
}
