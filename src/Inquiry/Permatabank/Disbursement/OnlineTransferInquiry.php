<?php

namespace Assetku\BankService\Inquiry\Permatabank\Disbursement;

use Assetku\BankService\Services\Permatabank\Response;

class OnlineTransferInquiry extends Response
{
    /**
     * @var string
     */
    protected $toAccount;

    /**
     * @var string
     */
    protected $toAccountFullName;

    /**
     * @var string
     */
    protected $bankId;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * OnlineTransferInquiry constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response->OlXferInqRs->MsgRsHdr);

        $this->toAccount = $response->OlXferInqRs->XferInfo->ToAccount;
        $this->toAccountFullName = $response->OlXferInqRs->XferInfo->ToAccountFullName;
        $this->bankId = $response->OlXferInqRs->XferInfo->BankId;
        $this->bankName = $response->OlXferInqRs->XferInfo->BankName;

        $this->success = $response->OlXferInqRs->MsgRsHdr->StatusCode === '00'
            && isset($this->toAccountFullName)
            && isset($this->bankName);
    }

    /**
     * Get online transfer inquiry's account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->toAccount;
    }

    /**
     * Get online transfer inquiry's account full name
     *
     * @return string
     */
    public function getAccountFullName()
    {
        return $this->toAccountFullName;
    }

    /**
     * Get online transfer inquiry's bank id
     *
     * @return string
     */
    public function getBankId()
    {
        return $this->bankId;
    }

    /**
     * Get online transfer inquiry's bank name
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }
}
