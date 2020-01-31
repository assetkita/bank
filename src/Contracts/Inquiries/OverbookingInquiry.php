<?php

namespace Assetku\BankService\Contracts\Inquiries;

interface OverbookingInquiry extends Inquiry
{
    /**
     * Get overbooking inquiry's toAccount number
     *
     * @return string
     */
    public function accountNumber();

    /**
     * Get overbooking inquiry's toAccount name
     *
     * @return string
     */
    public function accountName();
}
