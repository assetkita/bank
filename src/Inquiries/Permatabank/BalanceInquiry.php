<?php

namespace Assetku\BankService\Inquiries\Permatabank;

use Assetku\BankService\Contracts\Inquiries\BalanceInquiry as BalanceInquiryContract;

class BalanceInquiry extends Inquiry implements BalanceInquiryContract
{
    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @var string|null
     */
    protected $accountCurrency;

    /**
     * @var string|null
     */
    protected $accountBalanceAmount;

    /**
     * @var string|null
     */
    protected $balanceType;

    /**
     * BalanceInquiry constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $accountNumber
     * @param  string|null  $accountCurrency
     * @param  string|null  $accountBalanceAmount
     * @param  string|null  $balanceType
     */
    public function __construct(
        array $messageResponseHeader,
        string $accountNumber,
        $accountCurrency,
        $accountBalanceAmount,
        $balanceType
    ) {
        parent::__construct($messageResponseHeader);

        $this->accountNumber = $accountNumber;

        $this->accountCurrency = $accountCurrency;

        $this->accountBalanceAmount = $accountBalanceAmount;

        $this->balanceType = $balanceType;
    }

    /**
     * @inheritDoc
     */
    public function accountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @inheritDoc
     */
    public function accountCurrency()
    {
        return $this->accountCurrency;
    }

    /**
     * @inheritDoc
     */
    public function accountBalanceAmount()
    {
        return $this->accountBalanceAmount;
    }

    /**
     * @inheritDoc
     */
    public function balanceType()
    {
        return $this->balanceType;
    }
}
