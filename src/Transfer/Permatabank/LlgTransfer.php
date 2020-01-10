<?php

namespace Assetku\BankService\Transfer\Permatabank;

class LlgTransfer
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
     * @var string|null
     */
    protected $statusDescription;

    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * LlgTransfer constructor.
     *
     * @param $llgTransfer
     */
    public function __construct($llgTransfer)
    {
        $messageHeader = $llgTransfer->LlgXferAddRs->MsgRsHdr;
        
        $this->customerReferenceId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDescription = $messageHeader->StatusDesc ?? null;

        $this->transactionReferenceNumber = $llgTransfer->LlgXferAddRs->TrxReffNo;
    }

    /**
     * Get llg transfer's customer reference id
     * 
     * @return string
     */
    public function getCustomerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * Get llg transfer's status code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get llg transfer's status description
     *
     * @return string|null
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Get llg transfer's transaction reference number
     *
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }
}
