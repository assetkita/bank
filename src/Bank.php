<?php

namespace Assetku\BankService;

use Assetku\BankService\Contracts\BalanceInquirySubject;
use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Contracts\OnlineTransferInquirySubject;
use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Contracts\OverbookingInquirySubject;
use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Contracts\RtgsTransferSubject;
use Assetku\BankService\Contracts\StatusTransactionInquirySubject;
use Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\RtgsTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException;
use Assetku\BankService\Services\BankProvider;
use GuzzleHttp\Exception\GuzzleException;

class Bank
{
    /**
     * @var BankProvider
     */
    protected $bank;

    /**
     * Bank constructor.
     */
    public function __construct()
    {
        $this->bank = \App::make(BankProvider::class);
    }

    /**
     * Perform status transaction inquiry
     *
     * @param  \Assetku\BankService\Contracts\StatusTransactionInquirySubject  $subject
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\StatusTransactionInquiry
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException
     */
    public function statusTransactionInquiry(StatusTransactionInquirySubject $subject)
    {
        try {
            return $this->bank->statusTransactionInquiry($subject);
        } catch (StatusTransactionInquiryException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform balance inquiry
     *
     * @param  \Assetku\BankService\Contracts\BalanceInquirySubject  $subject
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\BalanceInquiry
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException
     */
    public function balanceInquiry(BalanceInquirySubject $subject)
    {
        try {
            return $this->bank->balanceInquiry($subject);
        } catch (BalanceInquiryException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform overbooking inquiry
     *
     * @param  \Assetku\BankService\Contracts\OverbookingInquirySubject  $subject
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\OverbookingInquiry
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException
     */
    public function overbookingInquiry(OverbookingInquirySubject $subject)
    {
        try {
            return $this->bank->overbookingInquiry($subject);
        } catch (OverbookingInquiryException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform online transfer inquiry
     *
     * @param  \Assetku\BankService\Contracts\OnlineTransferInquirySubject  $subject
     * @return \Assetku\BankService\Inquiry\Permatabank\Disbursement\OnlineTransferInquiry
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException
     */
    public function onlineTransferInquiry(OnlineTransferInquirySubject $subject)
    {
        try {
            return $this->bank->onlineTransferInquiry($subject);
        } catch (OnlineTransferInquiryException $e) {
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
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingException
     */
    public function overbooking(OverbookingSubject $subject)
    {
        try {
            return $this->bank->overbooking($subject);
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
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException
     */
    public function onlineTransfer(OnlineTransferSubject $subject)
    {
        try {
            return $this->bank->onlineTransfer($subject);
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
            return $this->bank->llgTransfer($subject);
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
            return $this->bank->rtgsTransfer($subject);
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
            return $this->bank->submitFintechAccount($data, $custRefID);
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
            $data = $this->bank->submitRegistrationDocument($data, $custRefID);

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
            $data = $this->bank->inquiryRiskRating($data, $custRefID);

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
            $data = $this->bank->inquiryAccountValidation($data, $custRefID);

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
            $data = $this->bank->updateKycStatus($data, $custRefID);

            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
