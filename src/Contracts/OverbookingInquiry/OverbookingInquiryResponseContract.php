<?php

namespace Assetku\BankService\Contracts\OverbookingInquiry;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface OverbookingInquiryResponseContract extends BaseResponseContract
{
    /**
     * Get overbooking inquiry response's account number
     *
     * @return string
     */
    public function accountNumber();

    /**
     * Get overbooking inquiry response's account name
     *
     * @return string
     */
    public function accountName();
}
