<?php

namespace Assetku\BankService\Transfer\OnlineTransfer;

class InquiryOnlineTransfer
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
     * @var string $toAccount
     */
    protected $toAccount;

    /**
     * @var string $toAccountFullName
     */
    protected $toAccountFullName;

    /**
     * @var string $bankId
     */
    protected $bankId;

    /**
     * @var string $bankName
     */
    protected $bankName;

    /**
     * init
     * 
     * @param object $inquiryOverbooking
     */
    public function __construct($inquiryOnlineTransfer) 
    {
        $messageHeader = $inquiryOnlineTransfer->OlXferInqRs->MsgRsHdr;
        
        $this->custRefId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc;

        $this->toAccount = $inquiryOnlineTransfer->OlXferInqRs->XferInfo->ToAccount;

        $this->toAccountFullName = $inquiryOnlineTransfer->OlXferInqRs->XferInfo->ToAccountFullName;
        
        $this->bankId = $inquiryOnlineTransfer->OlXferInqRs->XferInfo->BankId;

        $this->bankName = $inquiryOnlineTransfer->OlXferInqRs->XferInfo->BankName;

        $this->trxReffNo = $inquiryOnlineTransfer->OlXferInqRs->TrxReffNo;
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

    public function getAccount()
    {
        return $this->toAccount;
    }

    public function getAccountFullName()
    {
        return $this->toAccountFullName;
    }

    public function getBankId()
    {
        return $this->bankId;
    }

    public function getBankName()
    {
        return $this->bankName;
    }
}
