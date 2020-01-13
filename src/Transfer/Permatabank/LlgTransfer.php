<?php

namespace Assetku\BankService\Transfer\Permatabank;

use Assetku\BankService\Services\Permatabank\Response;

class LlgTransfer extends Response
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * LlgTransfer constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response->LlgXferAddRs->MsgRsHdr);

        $this->transactionReferenceNumber = $response->LlgXferAddRs->TrxReffNo;
    }

    /**
     * Get llg transfer's transaction reference number
     *
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }
}
