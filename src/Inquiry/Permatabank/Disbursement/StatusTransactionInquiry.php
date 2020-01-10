<?php

namespace Assetku\BankService\Inquiry\Permatabank\Disbursement;

class StatusTransactionInquiry
{
    /**
     * @var string
     */
    protected $customerReferenceId;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusDescription;

    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * StatusTransactionInquiry constructor.
     *
     * @param $inquiryStatusTransaction
     */
    public function __construct($inquiryStatusTransaction)
    {   
        $this->customerReferenceId =  $inquiryStatusTransaction->StatusTransactionRs->CustRefID;
        
        $this->statusCode = $inquiryStatusTransaction->StatusTransactionRs->StatusCode;
        
        $this->statusDescription = $inquiryStatusTransaction->StatusTransactionRs->StatusDesc ?? null;

        $this->transactionReferenceNumber = $inquiryStatusTransaction->StatusTransactionRs->TrxReffNo;
    }

    /**
     * Get status transaction inquiry's customer reference id
     * 
     * @return string
     */
    public function getCustomerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * Get status transaction inquiry's status code
     * 
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get status transaction inquiry's status description
     * 
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Get status transaction inquiry's transaction reference number
     * 
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }
}
