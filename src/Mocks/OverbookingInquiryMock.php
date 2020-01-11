<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\OverbookingInquirySubject;

class OverbookingInquiryMock implements OverbookingInquirySubject
{
    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * OverbookingInquiryMock constructor.
     *
     * @param  string  $accountNumber
     */
    public function __construct(string $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @inheritDoc
     */
    public function overbookingInquiryAccountNumber()
    {
        return $this->accountNumber;
    }
}
