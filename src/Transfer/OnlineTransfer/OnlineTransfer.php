<?php

namespace Assetku\BankService\Transfer\OnlineTransfer;

class OnlineTransfer
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
    public function __construct($onlineTransfer) 
    {
        $messageHeader = $onlineTransfer->OlXferAddRs->MsgRsHdr;
        
        $this->custRefId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc;

        $this->trxReffNo = $onlineTransfer->OlXferAddRs->TrxReffNo;
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
