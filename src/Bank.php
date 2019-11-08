<?php

namespace Assetku\BankService;

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
     * @param array $data
     * @param string $custRefID
     * @return mixed
     */
    public function onlineTransfer(array $data, string $custRefID)
    {
        try {
            $data = $this->bankProvider->onlineTransfer($data, $custRefID);
            return $data;
        } catch (GuzzleException $e) {
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
