<?php

namespace Assetku\BankService\Contracts\Transfers;

interface OnlineTransfer extends Transfer
{
    /**
     * Get online transfer's transaction reference number
     *
     * @return string
     */
    public function transactionReferenceNumber();
}
