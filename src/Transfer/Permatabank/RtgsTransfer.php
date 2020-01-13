<?php

namespace Assetku\BankService\Transfer\Permatabank;

class RtgsTransfer
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
     * @var string
     */
    protected $statusDesc;

    /**
     * @var string
     */
    protected $trxRefNo;

    /**
     * init Rtgs
     * 
     * @param object $rtgsTransferResponse
     */
    public function __construct($rtgsTransferResponse)
    {
        $this->custRefId = $rtgsTransferResponse->RtgsXferAddRs->MsgRsHdr->CustRefID;

        $this->statusCode = $rtgsTransferResponse->RtgsXferAddRs->MsgRsHdr->StatusCode;
        
        $this->statusDesc = $rtgsTransferResponse->RtgsXferAddRs->MsgRsHdr->StatusDesc;

        $this->trxRefNo = $rtgsTransferResponse->RtgsXferAddRs->TrxReffNo;
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getStatusDesc()
    {
        return $this->statusDesc;
    }

    /**
     * @return string
     */
    public function getCustRefId()
    {
        return $this->custRefId;
    }

    /**
     * @return string
     */
    public function getTrxRefNo()
    {
        return $this->trxRefNo;
    }
}
