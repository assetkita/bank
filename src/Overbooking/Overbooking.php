<?php 

namespace Assetku\BankService\Overbooking;

class Overbooking
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
     * @param object $overbooking
     */
    public function __construct($overbooking)
    {
        $messageHeader = $overbooking->XferAddRs->MsgRsHdr;
        
        $this->custRefId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc;

        $this->trxReffNo = $overbooking->XferAddRs->TrxReffNo;

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