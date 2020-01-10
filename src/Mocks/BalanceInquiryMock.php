<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\BalanceInquirySubject;

class BalanceInquiryMock implements BalanceInquirySubject
{
    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * BalanceInquiryMock constructor.
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
    public function balanceInquiryAccountNumber()
    {
        return $this->accountNumber;
    }
}
