<?php

namespace Assetku\BankService\Transfer\Permatabank;

use Assetku\BankService\Services\Permatabank\Response;

class RtgsTransfer extends Response
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * RtgsTransfer constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response->RtgsXferAddRs->MsgRsHdr);

        $this->transactionReferenceNumber = $response->RtgsXferAddRs->TrxReffNo;
    }

    /**
     * Get rtgs transfer's transaction reference number
     *
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }
}
