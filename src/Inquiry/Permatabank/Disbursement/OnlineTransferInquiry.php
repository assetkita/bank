<?php

namespace Assetku\BankService\Inquiry\Permatabank\Disbursement;

class OnlineTransferInquiry
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
     * @param $onlineTransferInquiry
     */
    public function __construct($onlineTransferInquiry)
    {
        $messageHeader = $onlineTransferInquiry->OlXferInqRs->MsgRsHdr;
        
        $this->customerReferenceId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDescription = $messageHeader->StatusDesc ?? null;

        $this->toAccount = $onlineTransferInquiry->OlXferInqRs->XferInfo->ToAccount;

        $this->toAccountFullName = $onlineTransferInquiry->OlXferInqRs->XferInfo->ToAccountFullName;
        
        $this->bankId = $onlineTransferInquiry->OlXferInqRs->XferInfo->BankId;

        $this->bankName = $onlineTransferInquiry->OlXferInqRs->XferInfo->BankName;

        $this->transactionReferenceNumber = $onlineTransferInquiry->OlXferInqRs->TrxReffNo;
    }

    /**
     * Get online transfer inquiry's customer reference id
     * 
     * @return string
     */
    public function getCustomerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * Get online transfer inquiry's status code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get online transfer inquiry's status description
     *
     * @return string|null
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Get online transfer inquiry's transaction reference number
     *
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }

    /**
     * Get online transfer inquiry's account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->toAccount;
    }

    /**
     * Get online transfer inquiry's account full name
     *
     * @return string
     */
    public function getAccountFullName()
    {
        return $this->toAccountFullName;
    }

    /**
     * Get online transfer inquiry's bank id
     *
     * @return string
     */
    public function getBankId()
    {
        return $this->bankId;
    }

    /**
     * Get online transfer inquiry's bank name
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }
}
