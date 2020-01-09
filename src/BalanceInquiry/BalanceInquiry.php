<?php

namespace Assetku\BankService\BalanceInquiry;

class BalanceInquiry
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
    protected $accountNumber;

    /**
     * @var string
     */
    protected $accountCurrency;

    /**
     * @var string
     */
    protected $accountBalanceAmount;

    /**
     * @var string
     */
    protected $balanceType;

    /**
     * init
     * 
     * @param object $balanceInquiryResponse
     */
    public function __construct($balanceInquiryResponse)
    {
        $messageHeader = $balanceInquiryResponse->BalInqRs->MsgRsHdr;

        $responseBody = $balanceInquiryResponse->BalInqRs->InqInfo;

        $this->custRefId = $messageHeader->CustRefID ?? null;

        $this->statusCode = $messageHeader->StatusCode ?? null;
        
        $this->statusDesc = $messageHeader->statusDesc ?? null;

        $this->accountNumber = $responseBody->AccountNumber ?? null;

        $this->accountCurrency = $responseBody->AccountCurrency ?? null;

        $this->accountBalanceAmount = $responseBody->AccountBalanceAmount ?? null;

        $this->balanceType = $responseBody->BalanceType ?? null;
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
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getAccountCurrency()
    {
        return $this->accountCurrency;
    }

    /**
     * @return string
     */
    public function getAccountBalanceAmount()
    {
        return $this->accountBalanceAmount;
    }

    /**
     * @return string
     */
    public function getBalanceType()
    {
        return $this->balanceType;
    }
}
