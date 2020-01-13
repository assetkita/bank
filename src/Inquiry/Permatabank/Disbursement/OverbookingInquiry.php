<?php

namespace Assetku\BankService\Inquiry\Permatabank\Disbursement;

use Assetku\BankService\Services\Permatabank\Response;

class OverbookingInquiry extends Response
{
    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @var string
     */
    protected $accountName;

    /**
     * OverbookingInquiry constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response->AcctInqRs->MsgRsHdr);

        $this->accountNumber = $response->AcctInqRs->InqInfo->AccountNumber;
        $this->accountName = $response->AcctInqRs->InqInfo->AccountName;

        $this->success = $response->AcctInqRs->MsgRsHdr->StatusCode === '00' && isset($this->accountName);
    }

    /**
     * Get overbooking inquiry's account number
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Get overbooking inquiry's account name
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->accountName;
    }
}
