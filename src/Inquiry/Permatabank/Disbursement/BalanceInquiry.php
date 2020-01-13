<?php

namespace Assetku\BankService\Inquiry\Permatabank\Disbursement;

use Assetku\BankService\Services\Permatabank\Response;

class BalanceInquiry extends Response
{
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
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response->BalInqRs->MsgRsHdr);

        $this->accountNumber = $response->BalInqRs->InqInfo->AccountNumber;
        $this->accountCurrency = $response->BalInqRs->InqInfo->AccountCurrency;
        $this->accountBalanceAmount = $response->BalInqRs->InqInfo->AccountBalanceAmount;
        $this->balanceType = $response->BalInqRs->InqInfo->BalanceType;

        $this->success = $response->BalInqRs->MsgRsHdr->StatusCode === '00'
            && isset($this->accountCurrency)
            && isset($this->accountBalanceAmount)
            && isset($this->balanceType);
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
