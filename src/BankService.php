<?php

namespace Assetku\BankService;

use Assetku\BankService\BalanceInquiry\Permatabank\BalanceInquiryFactory;
use Assetku\BankService\Contracts\AccessToken\AccessTokenRequestContract;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryFactoryContract;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryFactoryContract;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\NotifAccountOpeningStatus\NotifAccountOpeningStatusFactoryInterface;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryFactoryContract;
use Assetku\BankService\Contracts\ServiceInterface;
use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;
use Assetku\BankService\Contracts\Subjects\OnlineTransferSubject;
use Assetku\BankService\Contracts\Subjects\OverbookingSubject;
use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;
use Assetku\BankService\Contracts\Subjects\SubmitApplicationDataSubject;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentFactoryContract;
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
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class BankService
{
    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * BankService constructor.
     *
     * @param  ServiceInterface  $service
     */
    public function __construct(ServiceInterface $service)
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
            // remember the access token in cache for an hour
            return \Cache::remember('bank.access_token', 60, function () {
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
     * @param  \Assetku\BankService\Contracts\Subjects\SubmitApplicationDataSubject  $subject
     * @return \Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitApplicationData(SubmitApplicationDataSubject $subject)
    {
        $request = \App::make(SubmitApplicationDataFactoryContract::class)->makeRequest($subject);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->submitApplicationData($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform submit application document
     *
     * @param  string  $bankReferralId
     * @param  string  $url
     * @return \Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitApplicationDocument(string $bankReferralId, string $url)
    {
        $request = \App::make(SubmitApplicationDocumentFactoryContract::class)
            ->makeRequest($bankReferralId, $url);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->submitApplicationDocument($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform application status inquiry
     *
     * @param  string  $referralCode
     * @return \Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function applicationStatusInquiry(string $referralCode)
    {
        $request = \App::make(ApplicationStatusInquiryFactoryContract::class)->makeRequest($referralCode);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->applicationStatusInquiry($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform risk status inquiry
     *
     * @param  string  $idNumber
     * @param  string  $employmentType
     * @param  string  $economySector
     * @param  string  $position
     * @return \Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function riskRatingInquiry(string $idNumber, string $employmentType, string $economySector, string $position)
    {
        $request = \App::make(RiskRatingInquiryFactoryContract::class)
            ->makeRequest($idNumber, $employmentType, $economySector, $position);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->riskRatingInquiry($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform account validation inquiry
     *
     * @param  string  $accountNumber
     * @param  string  $idNumber
     * @param  string  $handPhoneNumber
     * @param  string  $customerName
     * @param  string  $dateOfBirth
     * @param  string  $cityOfBirth
     * @return \Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryResponseContract
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function accountValidationInquiry(
        string $accountNumber,
        string $idNumber,
        string $handPhoneNumber,
        string $customerName,
        string $dateOfBirth,
        string $cityOfBirth
    ) {
        $request = \App::make(AccountValidationInquiryFactoryContract::class)
            ->makeRequest(
                $accountNumber,
                $idNumber,
                $handPhoneNumber,
                $customerName,
                $dateOfBirth,
                $cityOfBirth
            );

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->accountValidationInquiry($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform update kyc status
     *
     * @param  string  $referralCode
     * @param  string  $idNumber
     * @param  string  $kycStatus
     * @return UpdateKycStatusResponseContract
     * @throws RequestException
     * @throws ValidationException
     */
    public function updateKycStatus(string $referralCode, string $idNumber, string $kycStatus)
    {
        $request = \App::make(UpdateKycStatusFactoryContract::class)->makeRequest($referralCode, $idNumber, $kycStatus);

        try {
            $this->validate($request);
        } catch (ValidationException $e) {
            throw $e;
        }

        try {
            return $this->service->updateKycStatus($request);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * Perform notif account opening status
     *
     * @param  string  $contents
     * @param  callable  $callback
     * @return string
     * @throws Exception
     */
    public function notifAccountOpeningStatus(string $contents, callable $callback)
    {
        $handler = \App::make(NotifAccountOpeningStatusFactoryInterface::class)->makeHandler($contents);

        try {
            return $this->service->notifAccountOpeningStatus($handler, $callback);
        } catch (Exception $e) {
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
            \Validator::make($data, $rules, $messages, $customAttributes)->validate();
        } catch (ValidationException $e) {
            throw $e;
        }
    }
}
