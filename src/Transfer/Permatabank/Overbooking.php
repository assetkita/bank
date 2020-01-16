<?php

namespace Assetku\BankService\Transfer\Permatabank;

use Assetku\BankService\Services\Permatabank\Response;

class Overbooking extends Response
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * Overbooking constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response->XferAddRs->MsgRsHdr);

        $this->transactionReferenceNumber = $response->XferAddRs->TrxReffNo;

        $this->success = $response->XferAddRs->MsgRsHdr->StatusCode === '00';
    }

    /**
     * Get overbooking's transaction reference number
     *
     * @return string
     */
    public function getTransactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }
}
