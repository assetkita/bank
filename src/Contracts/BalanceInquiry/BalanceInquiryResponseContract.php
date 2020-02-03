<?php

namespace Assetku\BankService\Contracts\BalanceInquiry;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface BalanceInquiryResponseContract extends BaseResponseContract
{
    /**
     * Get balance inquiry response's account number
     *
     * @return string
     */
    public function accountNumber();

    /**
     * Get balance inquiry response's account currency
     *
     * @return string
     */
    public function accountCurrency();

    /**
     * Get balance inquiry response's account balance amount
     *
     * @return string
     */
    public function accountBalanceAmount();

    /**
     * Get balance inquiry response's balance type
     *
     * @return string
     */
    public function balanceType();
}
