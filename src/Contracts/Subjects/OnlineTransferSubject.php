<?php

namespace Assetku\BankService\Contracts\Subjects;

interface OnlineTransferSubject
{
    /**
     * Get online transfer's from toAccount
     *
     * @return string
     */
    public function onlineTransferFromAccount();

    /**
     * Get online transfer's from toAccount name
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
     * Get online transfer's to bank toAccount
     *
     * @return string
     */
    public function onlineTransferToAccount();

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
     * Get online transfer's beneficiary toAccount name
     *
     * @return string
     */
    public function onlineTransferBeneficiaryAccountName();
}