<?php

namespace Assetku\BankService\Inquiry\Permatabank\Disbursement;

class OverbookingInquiry
{
    /**
     * @var string
     */
    protected $customerReferenceId;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string|null
     */
    protected $statusDescription;

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
     * @param $inquiryOverbooking
     */
    public function __construct($inquiryOverbooking)
    {
        $messageHeader = $inquiryOverbooking->AcctInqRs->MsgRsHdr;
        
        $this->customerReferenceId =  $messageHeader->CustRefID;
        
        $this->statusCode = $messageHeader->StatusCode;
        
        $this->statusDescription = $messageHeader->StatusDesc ?? null;

        $this->accountNumber = $inquiryOverbooking->AcctInqRs->InqInfo->AccountNumber;

        $this->accountName = $inquiryOverbooking->AcctInqRs->InqInfo->AccountName;
    }

    /**
     * Get overbooking inquiry's customer reference id
     *
     * @return string
     */
    public function getCustomerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * Get overbooking inquiry's status code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get overbooking inquiry's status description
     *
     * @return string|null
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
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
