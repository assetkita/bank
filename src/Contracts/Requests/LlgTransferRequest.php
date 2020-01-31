<?php

namespace Assetku\BankService\Contracts\Requests;

interface LlgTransferRequest extends Request
{
    /**
     * Get llg transfer request's from toAccount
     *
     * @return string
     */
    public function fromAccount();

    /**
     * Get llg transfer request's from toAccount name
     *
     * @return string
     */
    public function fromAccountName();

    /**
     * Get llg transfer request's from bank name
     *
     * @return string
     */
    public function fromBankName();

    /**
     * Get llg transfer request's to toAccount
     *
     * @return string
     */
    public function toAccount();

    /**
     * Get llg transfer request's to bank id
     *
     * @return string
     */
    public function toBankId();

    /**
     * Get llg transfer request's to bank name
     *
     * @return string
     */
    public function toBankName();

    /**
     * Get llg transfer request's beneficiary type
     *
     * @return string
     */
    public function beneficiaryType();

    /**
     * Get llg transfer request's beneficiary toAccount address
     *
     * @return string
     */
    public function beneficiaryAccountName();

    /**
     * Get llg transfer request's beneficiary bank branch name
     *
     * @return string
     */
    public function beneficiaryBankBranchName();

    /**
     * Get llg transfer request's beneficiary bank address
     *
     * @return string
     */
    public function beneficiaryBankAddress();

    /**
     * Get llg transfer request's beneficiary bank city
     *
     * @return string
     */
    public function beneficiaryBankCity();

    /**
     * Get llg transfer request's amount
     *
     * @return int|float|double
     */
    public function amount();

    /**
     * Get llg transfer request's transaction description
     *
     * @return string
     */
    public function transactionDescription();

    /**
     * Get llg transfer request's charge to
     *
     * @return string
     */
    public function chargeTo();

    /**
     * Get llg transfer request's citizen status
     *
     * @return string
     */
    public function citizenStatus();

    /**
     * Get llg transfer request's resident status
     *
     * @return string
     */
    public function residentStatus();
}
