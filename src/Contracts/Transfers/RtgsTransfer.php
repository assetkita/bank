<?php

namespace Assetku\BankService\Contracts\Transfers;

interface RtgsTransfer
{
    /**
     * Get rtgs transfer's transaction reference number
     *
     * @return string
     */
    public function transactionReferenceNumber();
}
