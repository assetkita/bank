<?php

namespace Assetku\BankService;

use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Contracts\RtgsTransferSubject;
use Assetku\BankService\Requests\Contracts\AccessTokenRequest;
use Assetku\BankService\Requests\Contracts\Factories\BalanceInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\LlgTransferRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OnlineTransferInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OnlineTransferRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OverbookingInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\OverbookingRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\RtgsTransferRequestFactory;
use Assetku\BankService\Requests\Contracts\Factories\StatusTransactionInquiryRequestFactory;
use Assetku\BankService\Requests\Contracts\MustValidated;
use Assetku\BankService\Services\Contracts\Service;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BankService
{
    /**
     * @var Service
     */
    protected $service;

    /**
     * BankService constructor.
     */
    public function __construct()
    {
        $this->service = \App::make(Service::class);
    }

    /**
     * Perform get access token
     *
     * @return string
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function accessToken()
    {
        try {
            // remember the access token in cache for 150 minutes (2.5 hours)
            return Cache::remember('permatabank.access_token', 150, function () {
                $request = \App::make(AccessTokenRequest::class);

                $this->validate($request);

                return $this->service->accessToken($request);
            });
        } catch (ValidationException $e) {
            throw $e;
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform balance inquiry
     *
     * @param  string  $accountNumber
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\BalanceInquiry
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function balanceInquiry(string $accountNumber)
    {
        $request = \App::make(BalanceInquiryRequestFactory::class)->make($accountNumber);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->balanceInquiry($request);
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform overbooking inquiry
     *
     * @param  string  $accountNumber
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\OverbookingInquiry
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function overbookingInquiry(string $accountNumber)
    {
        $request = \App::make(OverbookingInquiryRequestFactory::class)->make($accountNumber);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->overbookingInquiry($request);
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform online transfer inquiry
     *
     * @param  string  $toAccount
     * @param  string  $bankId
     * @param  string  $bankName
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\OnlineTransferInquiry
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function onlineTransferInquiry(string $toAccount, string $bankId, string $bankName)
    {
        $request = \App::make(OnlineTransferInquiryRequestFactory::class)->make($toAccount, $bankId, $bankName);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->onlineTransferInquiry($request);
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform status transaction inquiry
     *
     * @param  string  $customerReferenceId
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\StatusTransactionInquiry
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function statusTransactionInquiry(string $customerReferenceId)
    {
        $request = \App::make(StatusTransactionInquiryRequestFactory::class)->make($customerReferenceId);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->statusTransactionInquiry($request);
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform overbooking
     *
     * @param  \Assetku\BankService\Contracts\OverbookingSubject  $subject
     * @return \Assetku\BankService\Transfer\Permatabank\Overbooking
     * @throws \Assetku\BankService\Exceptions\OverbookingInquiryException
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function overbooking(OverbookingSubject $subject)
    {
        $request = \App::make(OverbookingRequestFactory::class)->make($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->overbooking($request);
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform online transfer
     *
     * @param  \Assetku\BankService\Contracts\OnlineTransferSubject  $subject
     * @return \Assetku\BankService\Transfer\Permatabank\OnlineTransfer
     * @throws \Assetku\BankService\Exceptions\OnlineTransferInquiryException
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function onlineTransfer(OnlineTransferSubject $subject)
    {
        $request = \App::make(OnlineTransferRequestFactory::class)->make($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->onlineTransfer($request);
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform LLG transfer
     *
     * @param  \Assetku\BankService\Contracts\LlgTransferSubject  $subject
     * @return \Assetku\BankService\Transfer\Permatabank\LlgTransfer
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function llgTransfer(LlgTransferSubject $subject)
    {
        $request = \App::make(LlgTransferRequestFactory::class)->make($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->llgTransfer($request);
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform RTGS transfer
     *
     * @param  \Assetku\BankService\Contracts\RtgsTransferSubject  $subject
     * @return \Assetku\BankService\Transfer\Permatabank\RtgsTransfer
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function rtgsTransfer(RtgsTransferSubject $subject)
    {
        $request = \App::make(RtgsTransferRequestFactory::class)->make($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->rtgsTransfer($request);
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Investa Account request
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     * @throws GuzzleException
     */
    public function submitFintechAccount(array $data, string $custRefID)
    {
        try {
            return $this->service->submitFintechAccount($data, $custRefID);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Investa Document upload
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     */
    public function submitDocument(array $data, string $custRefID)
    {
        try {
            $data = $this->service->submitRegistrationDocument($data, $custRefID);

            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Investa Check User High Risk Rating
     *
     * @param  array  $data
     * @param  string  $custRefID
     */
    public function inquiryRiskRating(array $data, string $custRefID)
    {
        try {
            $data = $this->service->inquiryRiskRating($data, $custRefID);

            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Investa Account Validation
     *
     * @param  array  $data
     * @param  string  $custRefID
     */
    public function inquiryAccountValidation(array $data, string $custRefID)
    {
        try {
            $data = $this->service->inquiryAccountValidation($data, $custRefID);

            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Investa update KYC Status
     *
     * @param  array  $data
     * @param  string  $custRefID
     */
    public function updateKycStatus(array $data, string $custRefID)
    {
        try {
            $data = $this->service->updateKycStatus($data, $custRefID);

            return $data;
        } catch (GuzzleException $e) {
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
