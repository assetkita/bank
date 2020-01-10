<?php

namespace Assetku\BankService;

use Assetku\BankService\Contracts\BalanceInquirySubject;
use Assetku\BankService\Contracts\BankContract;
use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use GuzzleHttp\Exception\GuzzleException;

class Bank
{
    /**
     * @var BankContract
     */
    protected $bank;

    /**
     * Bank constructor.
     */
    public function __construct()
    {
        $this->bank = \App::make(BankContract::class);
    }

    /**
     * overbooking request
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function overbooking(array $data, string $custRefID)
    {
        try {
            $data = $this->bank->overbooking($data, $custRefID);
            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * inquiry overbooking request
     * 
     * @param string $accountNumber
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryOverbooking(string $accountNumber, string $custRefID)
    {
        try {
            $data = $this->bank->inquiryOverbooking($accountNumber, $custRefID);
            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * online transfer inquiry
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function onlineTransferInquiry(array $data, string $custRefID)
    {
        try {
            $data = $this->bank->onlineTransferInquiry($data, $custRefID);
            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Perform online transfer
     *
     * @param  \Assetku\BankService\Contracts\OnlineTransferSubject  $subject
     * @return \Assetku\BankService\Transfer\OnlineTransfer\OnlineTransfer
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
     * @return \Assetku\BankService\Transfer\LlgTransfer\LlgTransfer
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * balance inquiry request
     *
     * @param  \Assetku\BankService\Contracts\BalanceInquirySubject  $subject
     * @return \Assetku\BankService\Transfer\OnlineTransfer\OnlineTransfer
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function balanceInquiry(BalanceInquirySubject $subject)
    {
        try {
            return $this->bank->balanceInquiry($subject);
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
     * @param array $data
     * @param string $custRefID
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
     * Investa Check Registration status
     * 
     * @param string $reffCode
     * @param string $custRefID
     */
    public function checkRegistrationStatus(string $reffCode, string $custRefID)
    {
        try {
            $data = $this->bank->inquiryApplicationStatus($reffCode, $custRefID);
            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Investa Check User High Risk Rating
     * 
     * @param array $data
     * @param string $custRefID
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
     * @param array $data
     * @param string $custRefID
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
     * @param array $data
     * @param string $custRefID
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

    /**
     * Inquiry Transaction statuses
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function inquiryStatusTransaction(string $custRefID)
    {
        try {
            $data = $this->bank->inquiryStatusTransaction($custRefID);
            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
