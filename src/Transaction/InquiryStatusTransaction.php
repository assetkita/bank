<?php

namespace Assetku\BankService\Transaction;

class InquiryStatusTransaction
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
     * @var string $trxReffNo
     */
    protected $trxReffNo;

    /**
     * init
     * 
     * @param object $inquiryOverbooking
     */
    public function __construct($inquiryStatusTransaction) 
    {   
        $this->custRefId =  $inquiryStatusTransaction->StatusTransactionRs->CustRefID;
        
        $this->statusCode = $inquiryStatusTransaction->StatusTransactionRs->StatusCode;
        
        $this->statusDesc = $inquiryStatusTransaction->StatusTransactionRs->StatusDesc;

        $this->trxReffNo = $inquiryStatusTransaction->StatusTransactionRs->TrxReffNo;
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
     * Get transfer reff number
     * 
     * @return $trxReffNo
     */
    public function getTrxReffNo()
    {
        return $this->trxReffNo;
    }
}
