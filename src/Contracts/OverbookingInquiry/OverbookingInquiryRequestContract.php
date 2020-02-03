<?php

namespace Assetku\BankService\Contracts\OverbookingInquiry;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface OverbookingInquiryRequestContract extends BaseRequestContract
{
    /**
     * Get overbooking inquiry request's account number
     *
     * @return string
     */
    public function accountNumber();
}
