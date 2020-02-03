<?php

namespace Assetku\BankService\Contracts;

use Assetku\BankService\Contracts\AccessToken\AccessTokenRequestContract;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryRequestContract;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryResponseContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferRequestContract;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferResponseContract;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferRequestContract;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferResponseContract;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryRequestContract;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryResponseContract;
use Assetku\BankService\Contracts\Overbooking\OverbookingRequestContract;
use Assetku\BankService\Contracts\Overbooking\OverbookingResponseContract;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryRequestContract;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryResponseContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferRequestContract;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferResponseContract;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryRequestContract;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryResponseContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataResponseContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentResponseContract;
use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\OverbookingInquiryException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

interface ServiceContract
{
    /**
     * Perform get access token
     *
     * @param  AccessTokenRequestContract  $request
     * @return string
     * @throws RequestException
     */
    public function accessToken(AccessTokenRequestContract $request);

    /**
     * Perform balance inquiry
     *
     * @param  BalanceInquiryRequestContract  $request
     * @return BalanceInquiryResponseContract
     * @throws RequestException
     */
    public function balanceInquiry(BalanceInquiryRequestContract $request);

    /**
     * Perform overbooking inquiry
     *
     * @param  OverbookingInquiryRequestContract  $request
     * @return OverbookingInquiryResponseContract
     * @throws RequestException
     */
    public function overbookingInquiry(OverbookingInquiryRequestContract $request);

    /**
     * Perform online transfer inquiry
     *
     * @param  OnlineTransferInquiryRequestContract  $request
     * @return OnlineTransferInquiryResponseContract
     * @throws RequestException
     */
    public function onlineTransferInquiry(OnlineTransferInquiryRequestContract $request);

    /**
     * Perform status transaction inquiry
     *
     * @param  StatusTransactionInquiryRequestContract  $request
     * @return StatusTransactionInquiryResponseContract
     * @throws RequestException
     */
    public function statusTransactionInquiry(StatusTransactionInquiryRequestContract $request);

    /**
     * Perform overbooking
     *
     * @param  OverbookingRequestContract  $request
     * @return OverbookingResponseContract
     * @throws RequestException
     * @throws ValidationException
     * @throws OverbookingInquiryException
     */
    public function overbooking(OverbookingRequestContract $request);

    /**
     * Perform online transfer
     *
     * @param  OnlineTransferRequestContract  $request
     * @return OnlineTransferResponseContract
     * @throws RequestException
     * @throws ValidationException
     * @throws OnlineTransferInquiryException
     */
    public function onlineTransfer(OnlineTransferRequestContract $request);

    /**
     * Perform LLG transfer
     *
     * @param  LlgTransferRequestContract  $request
     * @return LlgTransferResponseContract
     * @throws RequestException
     * @throws ValidationException
     */
    public function llgTransfer(LlgTransferRequestContract $request);

    /**
     * Perform RTGS transfer
     *
     * @param  RtgsTransferRequestContract  $request
     * @return RtgsTransferResponseContract
     * @throws RequestException
     * @throws ValidationException
     */
    public function rtgsTransfer(RtgsTransferRequestContract $request);

    /**
     * Perform submit application data
     *
     * @param  SubmitApplicationDataRequestContract  $request
     * @return SubmitApplicationDataResponseContract
     * @throws RequestException
     * @throws ValidationException
     */
    public function submitApplicationData(SubmitApplicationDataRequestContract $request);

    /**
     * Perform submit registration document
     *
     * @param  SubmitApplicationDocumentRequestContract  $request
     * @return SubmitApplicationDocumentResponseContract
     * @throws RequestException
     * @throws ValidationException
     */
    public function submitApplicationDocument(SubmitApplicationDocumentRequestContract $request);


    /**
     * Perform inquiry application status
     *
     * @param  string  $reffCode
     * @return mixed
     */
    public function inquiryApplicationStatus(string $reffCode);

    /**
     * Perform inquiry risk rating
     *
     * @param  array  $data
     * @return mixed
     */
    public function inquiryRiskRating(array $data);

    /**
     * Perform inquiry account validation
     *
     * @param  array  $data
     * @return mixed
     */
    public function inquiryAccountValidation(array $data);

    /**
     * Perform update KYC status
     *
     * @param  array  $data
     * @return mixed
     */
    public function updateKycStatus(array $data);
}
