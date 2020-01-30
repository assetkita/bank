<?php

namespace Assetku\BankService\Services\Contracts;

use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\OverbookingInquiryException;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\BalanceInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OnlineTransferInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OverbookingInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\StatusTransactionInquiry;
use Assetku\BankService\Requests\Contracts\AccessTokenRequest;
use Assetku\BankService\Requests\Contracts\BalanceInquiryRequest;
use Assetku\BankService\Requests\Contracts\LlgTransferRequest;
use Assetku\BankService\Requests\Contracts\OnlineTransferInquiryRequest;
use Assetku\BankService\Requests\Contracts\OnlineTransferRequest;
use Assetku\BankService\Requests\Contracts\OverbookingInquiryRequest;
use Assetku\BankService\Requests\Contracts\OverbookingRequest;
use Assetku\BankService\Requests\Contracts\RtgsTransferRequest;
use Assetku\BankService\Requests\Contracts\StatusTransactionInquiryRequest;
use Assetku\BankService\Transfer\Permatabank\LlgTransfer;
use Assetku\BankService\Transfer\Permatabank\OnlineTransfer;
use Assetku\BankService\Transfer\Permatabank\Overbooking;
use Assetku\BankService\Transfer\Permatabank\RtgsTransfer;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

interface Service
{
    /**
     * Perform get access token
     *
     * @param  AccessTokenRequest  $request
     * @return string
     * @throws HttpException
     * @throws GuzzleException
     */
    public function accessToken(AccessTokenRequest $request);

    /**
     * Perform balance inquiry
     *
     * @param  BalanceInquiryRequest  $request
     * @return BalanceInquiry
     * @throws HttpException
     * @throws GuzzleException
     */
    public function balanceInquiry(BalanceInquiryRequest $request);

    /**
     * Perform overbooking inquiry
     *
     * @param  OverbookingInquiryRequest  $request
     * @return OverbookingInquiry
     * @throws HttpException
     * @throws GuzzleException
     */
    public function overbookingInquiry(OverbookingInquiryRequest $request);

    /**
     * Perform online transfer inquiry
     *
     * @param  OnlineTransferInquiryRequest  $request
     * @return OnlineTransferInquiry
     * @throws HttpException
     * @throws GuzzleException
     */
    public function onlineTransferInquiry(OnlineTransferInquiryRequest $request);

    /**
     * Perform status transaction inquiry
     *
     * @param  StatusTransactionInquiryRequest  $request
     * @return StatusTransactionInquiry
     * @throws HttpException
     * @throws GuzzleException
     */
    public function statusTransactionInquiry(StatusTransactionInquiryRequest $request);

    /**
     * Perform overbooking
     *
     * @param  OverbookingRequest  $request
     * @return Overbooking
     * @throws ValidationException
     * @throws HttpException
     * @throws GuzzleException
     * @throws OverbookingInquiryException
     */
    public function overbooking(OverbookingRequest $request);

    /**
     * Perform online transfer
     *
     * @param  OnlineTransferRequest  $request
     * @return OnlineTransfer
     * @throws ValidationException
     * @throws HttpException
     * @throws GuzzleException
     * @throws OnlineTransferInquiryException
     */
    public function onlineTransfer(OnlineTransferRequest $request);

    /**
     * Perform LLG transfer
     *
     * @param  LlgTransferRequest  $request
     * @return LlgTransfer
     * @throws ValidationException
     * @throws HttpException
     * @throws GuzzleException
     */
    public function llgTransfer(LlgTransferRequest $request);

    /**
     * Perform RTGS transfer
     *
     * @param  RtgsTransferRequest  $request
     * @return RtgsTransfer
     * @throws ValidationException
     * @throws HttpException
     * @throws GuzzleException
     */
    public function rtgsTransfer(RtgsTransferRequest $request);

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
