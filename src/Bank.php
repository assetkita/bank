<?php

namespace Assetku\BankService;

use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use GuzzleHttp\Exception\GuzzleException;
use Assetku\BankService\Contracts\BankContract;

class Bank
{
    /**
     * initiate bank provider
     * 
     * @var $bankProvider
     */
    protected $bankProvider;
    
    /**
     * contructor of bank service
     */
    public function __construct()
    {
        $this->bankProvider = resolve(BankContract::class);
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
            $data = $this->bankProvider->overbooking($data, $custRefID);
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
            $data = $this->bankProvider->inquiryOverbooking($accountNumber, $custRefID);
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
            $data = $this->bankProvider->onlineTransferInquiry($data, $custRefID);
            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * online transder request
     *
     * @param  \Assetku\BankService\Contracts\OnlineTransferSubject  $subject
     * @return \Assetku\BankService\Transfer\OnlineTransfer\OnlineTransfer
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException
     */
    public function onlineTransfer(OnlineTransferSubject $subject)
    {
        try {
            return $this->bankProvider->onlineTransfer($subject);
        } catch (GuzzleException $e) {
            throw $e;
        } catch (OnlineTransferException $e) {
            throw $e;
        }
    }

    /**
     * LLG transfer request
     * 
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function llgTransfer(array $data, string $custRefID)
    {
        try {
            $data = $this->bankProvider->llgTransfer($data, $custRefID);
            return $data;
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
            return $this->bankProvider->submitFintechAccount($data, $custRefID);
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
            $data = $this->bankProvider->submitRegistrationDocument($data, $custRefID);
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
            $data = $this->bankProvider->inquiryApplicationStatus($reffCode, $custRefID);
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
            $data = $this->bankProvider->inquiryRiskRating($data, $custRefID);
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
            $data = $this->bankProvider->inquiryAccountValidation($data, $custRefID);
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
            $data = $this->bankProvider->updateKycStatus($data, $custRefID);
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
            $data = $this->bankProvider->inquiryStatusTransaction($custRefID);
            return $data;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
