<?php

namespace Assetku\BankService\Contracts\Inquiries;

interface BalanceInquiry extends Inquiry
{
    /**
     * Get balance inquiry's toAccount number
     *
     * @return string
     */
    public function accountNumber();

    /**
     * Get balance inquiry's toAccount currency
     *
     * @return string
     */
    public function accountCurrency();

    /**
     * Get balance inquiry's toAccount balance amount
     *
     * @return string
     */
    public function accountBalanceAmount();

    /**
     * Get balance inquiry's balance type
     *
     * @return string
     */
    public function balanceType();
}
