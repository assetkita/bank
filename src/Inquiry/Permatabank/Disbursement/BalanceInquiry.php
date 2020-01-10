<?php

namespace Assetku\BankService\Inquiry\Permatabank\Disbursement;

class BalanceInquiry
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
     * BalanceInquiry constructor.
     *
     * @param $balanceInquiryResponse
     */
    public function __construct($balanceInquiryResponse)
    {
        $messageHeader = $balanceInquiryResponse->BalInqRs->MsgRsHdr;

        $responseBody = $balanceInquiryResponse->BalInqRs->InqInfo;

        $this->customerReferenceId = $messageHeader->CustRefID;

        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDescription = $messageHeader->statusDesc ?? null;

        $this->accountNumber = $responseBody->AccountNumber;

        $this->accountCurrency = $responseBody->AccountCurrency;

        $this->accountBalanceAmount = $responseBody->AccountBalanceAmount;

        $this->balanceType = $responseBody->BalanceType;
    }

    /**
     * Get balance inquiry's customer reference id
     *
     * @return string
     */
    public function getCustomerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * Get balance inquiry's status code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get balance inquiry's status description
     *
     * @return string|null
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Get balance inquiry's account number
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Get balance inquiry's account currency
     *
     * @return string
     */
    public function getAccountCurrency()
    {
        return $this->accountCurrency;
    }

    /**
     * Get balance inquiry's account balance amount
     *
     * @return string
     */
    public function getAccountBalanceAmount()
    {
        return $this->accountBalanceAmount;
    }

    /**
     * Get balance inquiry's balance type
     *
     * @return string
     */
    public function getBalanceType()
    {
        return $this->balanceType;
    }
}
