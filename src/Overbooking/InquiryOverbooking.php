<?php

namespace Assetku\BankService\Overbooking;

class InquiryOverbooking
{
    /**
     * @var string $custRefId
     */
    protected $custRefId;

    /**
     * @var string $statusCode
     */
    protected $statusCode;

    /**
     * @var string $statusDesc
     */
    protected $statusDesc;

    /**
     * @var string $accountNumber
     */
    protected $accountNumber;

    /**
     * @var string $accountName
     */
    protected $accountName;

    /**
     * init
     * 
     * @param object $inquiryOverbooking
     */
    public function __construct($inquiryOverbooking) 
    {
        $messageHeader = $inquiryOverbooking->AcctInqRs->MsgRsHdr;
        
        $this->custRefId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc;

        $this->accountNumber = $inquiryOverbooking->AcctInqRs->InqInfo->AccountNumber;

        $this->accountName = $inquiryOverbooking->AcctInqRs->InqInfo->AccountName;
    }

    /**
     * Get customer refferences id
     * 
     * @return string $custRefId
     */
    public function getCustRefId()
    {
        return $this->custRefId;
    }

    /**
     * Get status code
     * 
     * @return $statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get status description
     * 
     * @return $statusDesc
     */
    public function getStatusDesc()
    {
        return $this->statusDesc;
    }

    /**
     * Get account number
     * 
     * @return $accountName
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Get Account name
     * 
     * @return $accountName
     */
    public function getAccountName()
    {
        return $this->accountName;
    }
}
