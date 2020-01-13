<?php

namespace Assetku\BankService\Inquiry\Permatabank\Disbursement;

use Assetku\BankService\Services\Permatabank\Response;

class StatusTransactionInquiry extends Response
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * StatusTransactionInquiry constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response->StatusTransactionRs);

        $this->transactionReferenceNumber = $response->StatusTransactionRs->TrxReffNo;

        $this->success = $response->StatusTransactionRs->StatusCode === '00' && isset($this->transactionReferenceNumber);
    }

    /**
     * Get status transaction inquiry's transaction reference number
     * 
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }
}
