<?php

namespace Assetku\BankService\Contracts\Subjects;

interface OnlineTransferSubject
{
    /**
     * Get online transfer's from account
     *
     * @return string
     */
    public function onlineTransferFromAccount();

    /**
     * Get online transfer's from account name
     *
     * @return string
     */
    public function onlineTransferFromAccountName();

    /**
     * Get online transfer's from bank name
     *
     * @return string
     */
    public function onlineTransferFromBankName();

    /**
     * Get online transfer's to account
     *
     * @return string
     */
    public function onlineTransferToAccount();

    /**
     * Get online transfer's to account name
     *
     * @return string
     */
    public function onlineTransferToAccountName();

    /**
     * Get online transfer's to bank id
     *
     * @return string
     */
    public function onlineTransferToBankId();

    /**
     * Get online transfer's to bank name
     *
     * @return string
     */
    public function onlineTransferToBankName();

    /**
     * Get online transfer's amount
     *
     * @return int|float|double
     */
    public function onlineTransferAmount();

    /**
     * Get online transfer's transaction description
     *
     * @return string
     */
    public function onlineTransferTransactionDescription();

    /**
     * Get online transfer's beneficiary account name
     *
     * @return string
     */
    public function onlineTransferBeneficiaryAccountName();
}
