<?php

namespace Assetku\BankService\Services;

interface FundAccount
{
    /**
     * Submit fintech Account Request
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     */
    public function submitFintechAccount(array $data, string $custRefID);

    /**
     * Submit fintech Account Request
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     */
    public function submitRegistrationDocument(array $data, string $custRefID);


    /**
     * Inquiry application status
     *
     * @param  string  $reffCode
     * @param  string  $custRefID
     * @return mixed
     */
    public function inquiryApplicationStatus(string $reffCode, string $custRefID);

    /**
     * Inquiry Risk rating
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     */
    public function inquiryRiskRating(array $data, string $custRefID);

    /**
     * Inquiry Account Validation
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     */
    public function inquiryAccountValidation(array $data, string $custRefID);

    /**
     * Update KYC Status
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     */
    public function updateKycStatus(array $data, string $custRefID);
}
