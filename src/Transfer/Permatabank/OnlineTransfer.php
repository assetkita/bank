<?php

namespace Assetku\BankService\Transfer\Permatabank;

use Assetku\BankService\Services\Permatabank\Response;

class OnlineTransfer extends Response
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * OnlineTransfer constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response->OlXferAddRs->MsgRsHdr);

        $this->transactionReferenceNumber = $response->OlXferAddRs->TrxReffNo;
    }

    /**
     * Get online transfer's transaction reference number
     *
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }
}
