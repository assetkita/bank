<?php 

namespace Assetku\BankService\Transfer\Permatabank;

class Overbooking
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
     * @var string|null
     */
    protected $statusDesc;

    /**
     * @var string
     */
    protected $trxReffNo;

    /**
     * Overbooking constructor.
     *
     * @param $overbooking
     */
    public function __construct($overbooking)
    {
        $messageHeader = $overbooking->XferAddRs->MsgRsHdr;
        
        $this->custRefId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc ?? null;

        $this->trxReffNo = $overbooking->XferAddRs->TrxReffNo;

    }

    /**
     * Get overbooking's customer reference id
     * 
     * @return string
     */
    public function getCustomerReferenceId()
    {
        return $this->custRefId;
    }

    /**
     * Get overbooking's status code
     * 
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get overbooking's status description
     * 
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDesc;
    }

    /**
     * Get overbooking's transaction reference number
     * 
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->trxReffNo;
    }
}
