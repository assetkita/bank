<?php

namespace Assetku\BankService;

use Assetku\BankService\BalanceInquiry\Permatabank\BalanceInquiryFactory;
use Assetku\BankService\Contracts\AccessToken\AccessTokenRequestContract;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\ServiceContract;
use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;
use Assetku\BankService\Contracts\Subjects\OnlineTransferSubject;
use Assetku\BankService\Contracts\Subjects\OverbookingSubject;
use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataResponseContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentResponseContract;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusFactoryContract;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusResponseContract;
use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\OverbookingInquiryException;
use Assetku\BankService\LlgTransfer\Permatabank\LlgTransferFactory;
use Assetku\BankService\OnlineTransfer\Permatabank\OnlineTransferFactory;
use Assetku\BankService\OnlineTransferInquiry\Permatabank\OnlineTransferInquiryFactory;
use Assetku\BankService\Overbooking\Permatabank\OverbookingFactory;
use Assetku\BankService\OverbookingInquiry\Permatabank\OverbookingInquiryFactory;
use Assetku\BankService\RtgsTransfer\Permatabank\RtgsTransferFactory;
use Assetku\BankService\StatusTransactionInquiry\Permatabank\StatusTransactionInquiryFactory;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Validation\ValidationException;

class BankService
{
    /**
     * @var ServiceContract
     */
    protected $service;

    /**
     * BankService constructor.
     *
     * @param  ServiceContract  $service
     */
    public function __construct(ServiceContract $service)
    {
        $this->service = $service;
    }

    /**
     * Perform get access token
     *
     * @return string
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function accessToken()
    {
        try {
            // remember the access token in cache for 150 minutes (2.5 hours)
            return \Cache::remember('permatabank.access_token', 150, function () {
                $request = \App::make(AccessTokenRequestContract::class);

                $this->validate($request);

                return $this->service->accessToken($request);
            });
        } catch (ValidationException $e) {
            throw $e;
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform balance inquiry
     *
     * @param  string  $accountNumber
     * @return \Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function balanceInquiry(string $accountNumber)
    {
        $request = \App::make(BalanceInquiryFactory::class)->makeRequest($accountNumber);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->balanceInquiry($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform overbooking inquiry
     *
     * @param  string  $accountNumber
     * @return \Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function overbookingInquiry(string $accountNumber)
    {
        $request = \App::make(OverbookingInquiryFactory::class)->makeRequest($accountNumber);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->overbookingInquiry($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform online transfer inquiry
     *
     * @param  string  $toAccount
     * @param  string  $bankId
     * @param  string  $bankName
     * @return \Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function onlineTransferInquiry(string $toAccount, string $bankId, string $bankName)
    {
        $request = \App::make(OnlineTransferInquiryFactory::class)->makeRequest($toAccount, $bankId, $bankName);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->onlineTransferInquiry($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform status transaction inquiry
     *
     * @param  string  $customerReferralId
     * @return \Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function statusTransactionInquiry(string $customerReferralId)
    {
        $request = \App::make(StatusTransactionInquiryFactory::class)->makeRequest($customerReferralId);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->statusTransactionInquiry($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform overbooking
     *
     * @param  \Assetku\BankService\Contracts\Subjects\OverbookingSubject  $subject
     * @return \Assetku\BankService\Contracts\Overbooking\OverbookingResponseContract
     * @throws \Assetku\BankService\Exceptions\OverbookingInquiryException
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function overbooking(OverbookingSubject $subject)
    {
        $request = \App::make(OverbookingFactory::class)->makeRequest($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->overbooking($request);
        } catch (RequestException $e) {
            throw $e;
        } catch (OverbookingInquiryException $e) {
            throw $e;
        }
    }

    /**
     * Perform online transfer
     *
     * @param  \Assetku\BankService\Contracts\Subjects\OnlineTransferSubject  $subject
     * @return \Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferResponseContract
     * @throws \Assetku\BankService\Exceptions\OnlineTransferInquiryException
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function onlineTransfer(OnlineTransferSubject $subject)
    {
        $request = \App::make(OnlineTransferFactory::class)->makeRequest($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->onlineTransfer($request);
        } catch (RequestException $e) {
            throw $e;
        } catch (OnlineTransferInquiryException $e) {
            throw $e;
        }
    }

    /**
     * Perform llg transfer
     *
     * @param  \Assetku\BankService\Contracts\Subjects\LlgTransferSubject  $subject
     * @return \Assetku\BankService\Contracts\LlgTransfer\LlgTransferResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function llgTransfer(LlgTransferSubject $subject)
    {
        $request = \App::make(LlgTransferFactory::class)->makeRequest($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->llgTransfer($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform rtgs transfer
     *
     * @param  \Assetku\BankService\Contracts\Subjects\RtgsTransferSubject  $subject
     * @return \Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function rtgsTransfer(RtgsTransferSubject $subject)
    {
        $request = \App::make(RtgsTransferFactory::class)->makeRequest($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->rtgsTransfer($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform submit application data
     *
     * @param  array  $data
     * @return \Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitApplicationData(array $data)
    {
        $request = \App::make(SubmitApplicationDataFactoryContract::class)->makeRequest($data);

        try {
            return $this->service->submitApplicationData($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform submit application document
     *
     * @param  array  $data
     * @return \Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitDocument(array $data)
    {
        $request = \App::make(SubmitApplicationDocumentFactoryContract::class)->makeRequest($data);

        try {
            return $this->service->submitApplicationDocument($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Investa Check User High Risk Rating
     *
     * @param  array  $data
     * @param  string  $custRefID
     */
    public function inquiryRiskRating(array $data)
    {
        try {
            $data = $this->service->inquiryRiskRating($data);

            return $data;
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Investa Account Validation
     *
     * @param  array  $data
     * @param  string  $custRefID
     */
    public function inquiryAccountValidation(array $data)
    {
        try {
            $data = $this->service->inquiryAccountValidation($data);

            return $data;
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform update kyc status
     *
     * @param  array  $data
     * @return UpdateKycStatusResponseContract
     * @throws RequestException
     * @throws ValidationException
     */
    public function updateKycStatus(array $data)
    {
        $request = \App::make(UpdateKycStatusFactoryContract::class)->makeRequest($data);

        try {
            return $this->service->updateKycStatus($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Validates the given request
     *
     * @param  MustValidated  $request
     * @throws ValidationException
     */
    protected function validate(MustValidated $request)
    {
        $data = $request->data();

        $rules = $request->rules();

        $messages = $request->messages();

        $customAttributes = $request->customAttributes();

        try {
            \App::make(Factory::class)->make($data, $rules, $messages, $customAttributes)->validate();
        } catch (ValidationException $e) {
            throw $e;
        }
    }
}
