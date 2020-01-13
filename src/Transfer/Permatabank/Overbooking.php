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
