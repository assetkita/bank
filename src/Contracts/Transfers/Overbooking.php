<?php

namespace Assetku\BankService\Contracts\Transfers;

interface Overbooking extends Transfer
{
    /**
     * Get overbooking's transaction reference number
     *
     * @return string
     */
    public function transactionReferenceNumber();
}
