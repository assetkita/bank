<?php

namespace Assetku\BankService\Contracts\Subjects;

interface RtgsTransferSubject
{
    /**
     * Get rtgs transfer's from toAccount
     *
     * @return string
     */
    public function rtgsTransferFromAccount();

    /**
     * Get rtgs transfer's from toAccount name
     *
     * @return string
     */
    public function rtgsTransferFromAccountName();

    /**
     * Get rtgs transfer's from bank name
     *
     * @return string
     */
    public function rtgsTransferFromBankName();

    /**
     * Get rtgs transfer's to toAccount
     *
     * @return string
     */
    public function rtgsTransferToAccount();

    /**
     * Get rtgs transfer's to bank id
     *
     * @return string
     */
    public function rtgsTransferToBankId();

    /**
     * Get rtgs transfer's to bank name
     *
     * @return string
     */
    public function rtgsTransferToBankName();

    /**
     * Get rtgs transfer's beneficiary toAccount name
     *
     * @return string
     */
    public function rtgsTransferBeneficiaryAccountName();

    /**
     * Get rtgs transfer's amount
     *
     * @return int|float|double
     */
    public function rtgsTransferAmount();

    /**
     * Get llg transfer's transaction description
     *
     * @return string
     */
    public function rtgsTransferTransactionDescription();
}
