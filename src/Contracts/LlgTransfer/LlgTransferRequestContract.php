<?php

namespace Assetku\BankService\Contracts\LlgTransfer;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface LlgTransferRequestContract extends BaseRequestContract
{
    /**
     * Get llg transfer request's from from account
     *
     * @return string
     */
    public function fromAccount();

    /**
     * Get llg transfer request's from account name
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
     * Get llg transfer request's to to account
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
     * Get llg transfer request's beneficiary account address
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
