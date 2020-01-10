<?php

namespace Assetku\BankService\Transfer\LlgTransfer;

class LlgTransfer
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
     * LlgTransfer constructor.
     *
     * @param $llgTransfer
     */
    public function __construct($llgTransfer)
    {
        $messageHeader = $llgTransfer->LlgXferAddRs->MsgRsHdr;
        
        $this->custRefId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc ?? null;

        $this->trxReffNo = $llgTransfer->LlgXferAddRs->TrxReffNo;
    }

    /**
     * Get customer reference identifier
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
     * Get transaction reference number
     *
     * @return string
     */
    public function getTrxReffNo()
    {
        return $this->trxReffNo;
    }
}
