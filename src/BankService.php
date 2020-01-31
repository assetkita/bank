<?php

namespace Assetku\BankService;

use Assetku\BankService\Contracts\Requests\AccessTokenRequest;
use Assetku\BankService\Contracts\Requests\BalanceInquiryRequestFactory;
use Assetku\BankService\Contracts\Requests\LlgTransferRequestFactory;
use Assetku\BankService\Contracts\Requests\MustValidated;
use Assetku\BankService\Contracts\Requests\OnlineTransferInquiryRequestFactory;
use Assetku\BankService\Contracts\Requests\OnlineTransferRequestFactory;
use Assetku\BankService\Contracts\Requests\OverbookingInquiryRequestFactory;
use Assetku\BankService\Contracts\Requests\OverbookingRequestFactory;
use Assetku\BankService\Contracts\Requests\RtgsTransferRequestFactory;
use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequestFactory;
use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;
use Assetku\BankService\Contracts\Subjects\OnlineTransferSubject;
use Assetku\BankService\Contracts\Subjects\OverbookingSubject;
use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;
use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\OverbookingInquiryException;
use Assetku\BankService\Services\Contracts\Service;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Validation\ValidationException;

class BankService
{
    /**
     * @var Service
     */
    protected $service;

    /**
     * BankService constructor.
     *
     * @param  Service  $service
     */
    public function __construct(Service $service)
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
                $request = \App::make(AccessTokenRequest::class);

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
     * @return \Assetku\BankService\Contracts\Inquiries\BalanceInquiry
     * @throws \GuzzleHttp\Exception\RequestException
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
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform overbooking inquiry
     *
     * @param  string  $accountNumber
     * @return \Assetku\BankService\Contracts\Inquiries\OverbookingInquiry
     * @throws \GuzzleHttp\Exception\RequestException
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
     * @return \Assetku\BankService\Contracts\Inquiries\OnlineTransferInquiry
     * @throws \GuzzleHttp\Exception\RequestException
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
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform status transaction inquiry
     *
     * @param  string  $customerReferenceId
     * @return \Assetku\BankService\Contracts\Inquiries\StatusTransactionInquiry
     * @throws \GuzzleHttp\Exception\RequestException
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
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform overbooking
     *
     * @param  \Assetku\BankService\Contracts\Subjects\OverbookingSubject  $subject
     * @return \Assetku\BankService\Contracts\Transfers\Overbooking
     * @throws \Assetku\BankService\Exceptions\OverbookingInquiryException
     * @throws \GuzzleHttp\Exception\RequestException
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
     * @return \Assetku\BankService\Contracts\Transfers\OnlineTransfer
     * @throws \Assetku\BankService\Exceptions\OnlineTransferInquiryException
     * @throws \GuzzleHttp\Exception\RequestException
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
     * @return \Assetku\BankService\Contracts\Transfers\LlgTransfer
     * @throws \GuzzleHttp\Exception\RequestException
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
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform rtgs transfer
     *
     * @param  \Assetku\BankService\Contracts\Subjects\RtgsTransferSubject  $subject
     * @return \Assetku\BankService\Contracts\Transfers\RtgsTransfer
     * @throws \GuzzleHttp\Exception\RequestException
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
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Investa Account request
     *
     * @param  array  $data
     * @param  string  $custRefID
     * @return mixed
     * @throws RequestException
     */
    public function submitFintechAccount(array $data, string $custRefID)
    {
        try {
            return $this->service->submitFintechAccount($data, $custRefID);
        } catch (RequestException $e) {
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
    public function inquiryRiskRating(array $data, string $custRefID)
    {
        try {
            $data = $this->service->inquiryRiskRating($data, $custRefID);

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
    public function inquiryAccountValidation(array $data, string $custRefID)
    {
        try {
            $data = $this->service->inquiryAccountValidation($data, $custRefID);

            return $data;
        } catch (RequestException $e) {
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
