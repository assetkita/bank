<?php

namespace Assetku\BankService\Contracts\OnlineTransfer;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface OnlineTransferRequestContract extends BaseRequestContract
{
    /**
     * Get online transfer request's from account
     *
     * @return string
     */
    public function fromAccount();

    /**
     * Get online transfer request's from account name
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
     * Get online transfer request's to account
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
     * Get online transfer request's beneficiary account name
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
