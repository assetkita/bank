<?php

namespace Assetku\BankService\Contracts\Subjects;

interface LlgTransferSubject
{
    /**
     * Get llg transfer's from toAccount
     *
     * @return string
     */
    public function llgTransferFromAccount();

    /**
     * Get llg transfer's from toAccount name
     *
     * @return string
     */
    public function llgTransferFromAccountName();

    /**
     * Get llg transfer's from bank name
     *
     * @return string
     */
    public function llgTransferFromBankName();

    /**
     * Get llg transfer's to account
     *
     * @return string
     */
    public function llgTransferToAccount();

    /**
     * Get llg transfer's to account name
     *
     * @return string
     */
    public function llgTransferToAccountName();

    /**
     * Get llg transfer's to bank id
     *
     * @return string
     */
    public function llgTransferToBankId();

    /**
     * Get llg transfer's to bank name
     *
     * @return string
     */
    public function llgTransferToBankName();

    /**
     * Get llg transfer's beneficiary toAccount name
     *
     * @return string
     */
    public function llgTransferBeneficiaryAccountName();

    /**
     * Get llg transfer's amount
     *
     * @return int|float|double
     */
    public function llgTransferAmount();

    /**
     * Get llg transfer's transaction description
     *
     * @return string
     */
    public function llgTransferTransactionDescription();
}
