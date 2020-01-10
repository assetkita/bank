<?php

namespace Assetku\BankService\Transfer\OnlineTransfer;

class OnlineTransferInquiry
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
     * @var string
     */
    protected $toAccount;

    /**
     * @var string
     */
    protected $toAccountFullName;

    /**
     * @var string
     */
    protected $bankId;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * OnlineTransferInquiry constructor.
     *
     * @param $inquiryOnlineTransfer
     */
    public function __construct($inquiryOnlineTransfer)
    {
        $messageHeader = $inquiryOnlineTransfer->OlXferInqRs->MsgRsHdr;
        
        $this->custRefId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDesc = $messageHeader->StatusDesc ?? null;

        $this->toAccount = $inquiryOnlineTransfer->OlXferInqRs->XferInfo->ToAccount;

        $this->toAccountFullName = $inquiryOnlineTransfer->OlXferInqRs->XferInfo->ToAccountFullName;
        
        $this->bankId = $inquiryOnlineTransfer->OlXferInqRs->XferInfo->BankId;

        $this->bankName = $inquiryOnlineTransfer->OlXferInqRs->XferInfo->BankName;

        $this->trxReffNo = $inquiryOnlineTransfer->OlXferInqRs->TrxReffNo;
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

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->toAccount;
    }

    /**
     * Get account full name
     *
     * @return string
     */
    public function getAccountFullName()
    {
        return $this->toAccountFullName;
    }

    /**
     * Get bank identifier
     *
     * @return string
     */
    public function getBankId()
    {
        return $this->bankId;
    }

    /**
     * Get bank name
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }
}
