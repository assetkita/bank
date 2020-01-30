<?php

namespace Assetku\BankService\Requests\Contracts;

interface OverbookingRequest extends Request
{
    /**
     * Get overbooking request's from account
     *
     * @return string
     */
    public function fromAccount();

    /**
     * Get overbooking request's from account name
     *
     * @return string
     */
    public function fromAccountName();

    /**
     * Get overbooking request's from bank name
     *
     * @return string
     */
    public function fromBankName();

    /**
     * Get overbooking request's to account
     *
     * @return string
     */
    public function toAccount();

    /**
     * Get overbooking request's to account name
     *
     * @return string
     */
    public function toAccountName();

    /**
     * Get overbooking request's to bank name
     *
     * @return string
     */
    public function toBankName();

    /**
     * Get overbooking request's beneficiary account name
     *
     * @return string
     */
    public function beneficiaryAccountName();

    /**
     * Get overbooking request's amount
     *
     * @return int|float|double
     */
    public function amount();

    /**
     * Get overbooking request's transaction description
     *
     * @return string
     */
    public function transactionDescription();

    /**
     * Get overbooking request's currency code
     *
     * @return string
     */
    public function currencyCode();

    /**
     * Get overbooking request's charge to
     *
     * @return string
     */
    public function chargeTo();
}
