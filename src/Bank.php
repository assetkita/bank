<?php

namespace Assetku\BankService;

use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Contracts\RtgsTransferSubject;
use Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\RtgsTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException;
use Assetku\BankService\Services\BankService;
use GuzzleHttp\Exception\GuzzleException;

class Bank
{
    /**
     * @var BankService
     */
    protected $bankService;

    /**
     * Bank constructor.
     */
    public function __construct()
    {
        $this->bankService = \App::make(BankService::class);
    }

    /**
     * Perform balance inquiry
     *
     * @param  string  $accountName
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\BalanceInquiry
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException
     */
    public function balanceInquiry(string $accountName)
    {
        try {
            return $this->bankService->balanceInquiry($accountName);
        } catch (BalanceInquiryException $e) {
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException
     */
    public function overbookingInquiry(string $accountNumber)
    {
        try {
            return $this->bankService->overbookingInquiry($accountNumber);
        } catch (OverbookingInquiryException $e) {
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException
     */
    public function onlineTransferInquiry(string $toAccount, string $bankId, string $bankName)
    {
        try {
            return $this->bankService->onlineTransferInquiry($toAccount, $bankId, $bankName);
        } catch (OnlineTransferInquiryException $e) {
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException
     */
    public function statusTransactionInquiry(string $customerReferenceId)
    {
        try {
            return $this->bankService->statusTransactionInquiry($customerReferenceId);
        } catch (StatusTransactionInquiryException $e) {
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingException
     */
    public function overbooking(OverbookingSubject $subject)
    {
        try {
            return $this->bankService->overbooking($subject);
        } catch (OverbookingException $e) {
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException
     */
    public function onlineTransfer(OnlineTransferSubject $subject)
    {
        try {
            return $this->bankService->onlineTransfer($subject);
        } catch (OnlineTransferException $e) {
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException
     */
    public function llgTransfer(LlgTransferSubject $subject)
    {
        try {
            return $this->bankService->llgTransfer($subject);
        } catch (LlgTransferException $e) {
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\RtgsTransferException
     */
    public function rtgsTransfer(RtgsTransferSubject $subject)
    {
        try {
            return $this->bankService->rtgsTransfer($subject);
        } catch (RtgsTransferException $e) {
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
            return $this->bankService->submitFintechAccount($data, $custRefID);
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
            $data = $this->bankService->submitRegistrationDocument($data, $custRefID);

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
            $data = $this->bankService->inquiryRiskRating($data, $custRefID);

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
            $data = $this->bankService->inquiryAccountValidation($data, $custRefID);

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
            $data = $this->bankService->updateKycStatus($data, $custRefID);

            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
