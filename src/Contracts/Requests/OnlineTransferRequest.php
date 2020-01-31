<?php

namespace Assetku\BankService\Contracts\Requests;

interface OnlineTransferRequest extends Request
{
    /**
     * Get online transfer request's from toAccount
     *
     * @return string
     */
    public function fromAccount();

    /**
     * Get online transfer request's from toAccount name
     *
     * @return string
     */
    public function fromAccountName();

    /**
     * Get online transfer request's from bank name
     *
     * @return string
     */
    public function fromBankName();

    /**
     * Get online transfer request's to toAccount
     *
     * @return string
     */
    public function toAccount();

    /**
     * Get online transfer request's to bank id
     *
     * @return string
     */
    public function toBankId();

    /**
     * Get online transfer request's to bank name
     *
     * @return string
     */
    public function toBankName();

    /**
     * Get online transfer request's beneficiary toAccount name
     *
     * @return string
     */
    public function beneficiaryAccountName();

    /**
     * Get online transfer request's amount
     *
     * @return int|float|double
     */
    public function amount();

    /**
     * Get online transfer request's transaction description
     *
     * @return string
     */
    public function transactionDescription();

    /**
     * Get online transfer request's charge to
     *
     * @return string
     */
    public function chargeTo();
}
