<?php

namespace Assetku\BankService\Contracts\Requests;

interface RtgsTransferRequest extends Request
{
    /**
     * Get rtgs transfer request's from toAccount
     *
     * @return string
     */
    public function fromAccount();

    /**
     * Get rtgs transfer request's from toAccount name
     *
     * @return string
     */
    public function fromAccountName();

    /**
     * Get rtgs transfer request's from bank name
     *
     * @return string
     */
    public function fromBankName();

    /**
     * Get rtgs transfer request's to toAccount
     *
     * @return string
     */
    public function toAccount();

    /**
     * Get rtgs transfer request's to bank id
     *
     * @return string
     */
    public function toBankId();

    /**
     * Get rtgs transfer request's to bank name
     *
     * @return string
     */
    public function toBankName();

    /**
     * Get rtgs transfer request's beneficiary type
     *
     * @return string
     */
    public function beneficiaryType();

    /**
     * Get rtgs transfer request's beneficiary toAccount address
     *
     * @return string
     */
    public function beneficiaryAccountName();

    /**
     * Get rtgs transfer request's beneficiary bank branch name
     *
     * @return string
     */
    public function beneficiaryBankBranchName();

    /**
     * Get rtgs transfer request's beneficiary bank address
     *
     * @return string
     */
    public function beneficiaryBankAddress();

    /**
     * Get rtgs transfer request's beneficiary bank city
     *
     * @return string
     */
    public function beneficiaryBankCity();

    /**
     * Get rtgs transfer request's amount
     *
     * @return int|float|double
     */
    public function amount();

    /**
     * Get rtgs transfer request's transaction description
     *
     * @return string
     */
    public function transactionDescription();

    /**
     * Get rtgs transfer request's charge to
     *
     * @return string
     */
    public function chargeTo();

    /**
     * Get rtgs transfer request's citizen status
     *
     * @return string
     */
    public function citizenStatus();

    /**
     * Get rtgs transfer request's resident status
     *
     * @return string
     */
    public function residentStatus();
}
