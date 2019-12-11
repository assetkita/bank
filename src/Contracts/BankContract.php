<?php

namespace Assetku\BankService\Contracts;

interface BankContract
{
    /**
     * Oauth token request
     *
     * @return mixed
     */
    public function getToken();

    /**
     * overbooking request
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function overbooking(array $data, string $custRefID);

    /**
     * Inquiry overbooking request
     * 
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryOverbooking(string $accountNumber, string $custRefID);

    /**
     * Inquiry Online Transfer Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function onlineTransferInquiry(array $data, string $custRefID);

    /**
     * Online Transfer Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function onlineTransfer(array $data, string $custRefID);

    /**
     * LLG Transfer Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function llgTransfer(array $data, string $custRefID);

    /**
     * Submit Fintech Account Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function submitFintechAccount(array $data, string $custRefID);

    /**
     * Submit Fintech Account Request
     *
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function submitRegistrationDocument(array $data, string $custRefID);


    /**
     * Inquiry application status
     *
     * @param string $reffCode
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryApplicationStatus(string $reffCode, string $custRefID);

    /**
     * Inquiry Risk rating
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryRiskRating(array $data, string $custRefID);

    /**
     * Inquiry Account Validation
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryAccountValidation(array $data, string $custRefID);

    /**
     * Update KYC Status
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function updateKycStatus(array $data, string $custRefID);

    /**
     * Inquiry status transaction
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryStatusTransaction(string $custRefID);
}