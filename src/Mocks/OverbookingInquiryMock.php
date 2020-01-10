<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\OverbookingInquirySubject;

class OverbookingInquiryMock implements OverbookingInquirySubject
{
    /**
     * @inheritDoc
     */
    public function overbookingInquiryAccountNumber()
    {
        return '9999002800';
    }
}
