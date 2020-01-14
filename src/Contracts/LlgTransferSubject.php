<?php

namespace Assetku\BankService\Contracts;

interface LlgTransferSubject
{
    /**
     * Get llg transfer's from account
     *
     * @return string
     */
    public function llgTransferFromAccount();

    /**
     * Get llg transfer's from account name
     *
     * @return string
     */
    public function llgTransferFromAccountName();

    /**
     * Get llg transfer's to account
     *
     * @return string
     */
    public function llgTransferToAccount();

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

    /**
     * Get llg transfer's beneficiary account name
     *
     * @return string
     */
    public function llgTransferBeneficiaryAccountName();

    /**
     * Get llg transfer's beneficiary bank address
     *
     * @return string
     */
    public function llgTransferBeneficiaryBankAddress();

    /**
     * Get llg transfer's beneficiary bank branch name
     *
     * @return string
     */
    public function llgTransferBeneficiaryBankBranchName();

    /**
     * Get llg transfer's beneficiary branch city
     *
     * @return string
     */
    public function llgTransferBeneficiaryBankCity();
}