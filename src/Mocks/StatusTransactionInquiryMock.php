<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\StatusTransactionInquirySubject;

class StatusTransactionInquiryMock implements StatusTransactionInquirySubject
{
    /**
     * @var string
     */
    protected $customerReferenceId;

    /**
     * StatusTransactionInquiryMock constructor.
     *
     * @param  string  $customerReferenceId
     */
    public function __construct(string $customerReferenceId)
    {
        $this->customerReferenceId = $customerReferenceId;
    }

    /**
     * @inheritDoc
     */
    public function statusTransactionInquiryCustomerReferenceId()
    {
        return $this->customerReferenceId;
    }
}
