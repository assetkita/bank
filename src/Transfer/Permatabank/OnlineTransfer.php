<?php

namespace Assetku\BankService\Transfer\Permatabank;

class OnlineTransfer
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
    protected $statusDesc;

    /**
     * @var string
     */
    protected $transferReferenceNumber;

    /**
     * OnlineTransfer constructor.
     *
     * @param $onlineTransfer
     */
    public function __construct($onlineTransfer)
    {
        $messageHeader = $onlineTransfer->OlXferAddRs->MsgRsHdr;
        
        $this->customerReferenceId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc ?? null;

        $this->transferReferenceNumber = $onlineTransfer->OlXferAddRs->TrxReffNo;
    }

    /**
     * Get online transfer's customer references id
     * 
     * @return string
     */
    public function getCustomerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * Get online transfer's status code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get online transfer's status description
     *
     * @return string|null
     */
    public function getStatusDescription()
    {
        return $this->statusDesc;
    }

    /**
     * Get online transfer's transaction reference number
     *
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transferReferenceNumber;
    }
}
