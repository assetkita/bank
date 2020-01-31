<?php

namespace Assetku\BankService\Services\Contracts;

use Assetku\BankService\Contracts\Inquiries\BalanceInquiry;
use Assetku\BankService\Contracts\Inquiries\OnlineTransferInquiry;
use Assetku\BankService\Contracts\Inquiries\OverbookingInquiry;
use Assetku\BankService\Contracts\Inquiries\StatusTransactionInquiry;
use Assetku\BankService\Contracts\Requests\AccessTokenRequest;
use Assetku\BankService\Contracts\Requests\BalanceInquiryRequest;
use Assetku\BankService\Contracts\Requests\LlgTransferRequest;
use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequest;
use Assetku\BankService\Contracts\Requests\OnlineTransferRequest;
use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequest;
use Assetku\BankService\Contracts\Requests\OverbookingRequest;
use Assetku\BankService\Contracts\Requests\RtgsTransferRequest;
use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequest;
use Assetku\BankService\Contracts\Transfers\LlgTransfer;
use Assetku\BankService\Contracts\Transfers\OnlineTransfer;
use Assetku\BankService\Contracts\Transfers\Overbooking;
use Assetku\BankService\Contracts\Transfers\RtgsTransfer;
use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\OverbookingInquiryException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

interface Service
{
    /**
     * Perform get access token
     *
     * @param  AccessTokenRequest  $request
     * @return string
     * @throws RequestException
     */
    public function accessToken(AccessTokenRequest $request);

    /**
     * Perform balance inquiry
     *
     * @param  BalanceInquiryRequest  $request
     * @return BalanceInquiry
     * @throws RequestException
     */
    public function balanceInquiry(BalanceInquiryRequest $request);

    /**
     * Perform overbooking inquiry
     *
     * @param  OverbookingInquiryRequest  $request
     * @return OverbookingInquiry
     * @throws RequestException
     */
    public function overbookingInquiry(OverbookingInquiryRequest $request);

    /**
     * Perform online transfer inquiry
     *
     * @param  OnlineTransferInquiryRequest  $request
     * @return OnlineTransferInquiry
     * @throws RequestException
     */
    public function onlineTransferInquiry(OnlineTransferInquiryRequest $request);

    /**
     * Perform status transaction inquiry
     *
     * @param  StatusTransactionInquiryRequest  $request
     * @return StatusTransactionInquiry
     * @throws RequestException
     */
    public function statusTransactionInquiry(StatusTransactionInquiryRequest $request);

    /**
     * Perform overbooking
     *
     * @param  OverbookingRequest  $request
     * @return Overbooking
     * @throws RequestException
     * @throws ValidationException
     * @throws OverbookingInquiryException
     */
    public function overbooking(OverbookingRequest $request);

    /**
     * Perform online transfer
     *
     * @param  OnlineTransferRequest  $request
     * @return OnlineTransfer
     * @throws RequestException
     * @throws ValidationException
     * @throws OnlineTransferInquiryException
     */
    public function onlineTransfer(OnlineTransferRequest $request);

    /**
     * Perform LLG transfer
     *
     * @param  LlgTransferRequest  $request
     * @return LlgTransfer
     * @throws RequestException
     * @throws ValidationException
     */
    public function llgTransfer(LlgTransferRequest $request);

    /**
     * Perform RTGS transfer
     *
     * @param  RtgsTransferRequest  $request
     * @return RtgsTransfer
     * @throws RequestException
     * @throws ValidationException
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
