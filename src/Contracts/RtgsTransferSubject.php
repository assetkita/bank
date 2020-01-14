<?php

namespace Assetku\BankService\Contracts;

interface RtgsTransferSubject
{
    /**
     * Get rtgs transfer's from account
     *
     * @return string
     */
    public function rtgsTransferFromAccount();

    /**
     * Get rtgs transfer's from account name
     *
     * @return string
     */
    public function rtgsTransferFromAccountName();

    /**
     * Get rtgs transfer's to account
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

    /**
     * Get rtgs transfer's beneficiary account name
     *
     * @return string
     */
    public function rtgsTransferBeneficiaryAccountName();

    /**
     * Get rtgs transfer's beneficiary bank address
     *
     * @return string
     */
    public function rtgsTransferBeneficiaryBankAddress();

    /**
     * Get rtgs transfer's bank branch name
     *
     * @return string
     */
    public function rtgsTransferBeneficiaryBankBranchName();

    /**
     * Get rtgs transfer's bank city
     *
     * @return string
     */
    public function rtgsTransferBeneficiaryBankCity();
}
