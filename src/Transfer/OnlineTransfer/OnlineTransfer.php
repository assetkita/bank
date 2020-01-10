<?php

namespace Assetku\BankService\Transfer\OnlineTransfer;

class OnlineTransfer
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
     * OnlineTransfer constructor.
     *
     * @param $onlineTransfer
     */
    public function __construct($onlineTransfer)
    {
        $messageHeader = $onlineTransfer->OlXferAddRs->MsgRsHdr;
        
        $this->custRefId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc ?? null;

        $this->trxReffNo = $onlineTransfer->OlXferAddRs->TrxReffNo;
    }

    /**
     * Get customer references identifier
     * 
     * @return string
     */
    public function getCustRefId()
    {
        return $this->custRefId;
    }

    /**
     * Get status code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get status description
     *
     * @return string|null
     */
    public function getStatusDesc()
    {
        return $this->statusDesc;
    }

    /**
     * Get transfer reference number
     *
     * @return string
     */
    public function getTrxReffNo()
    {
        return $this->trxReffNo;
    }
}
