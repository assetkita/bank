<?php

namespace Assetku\BankService\Contracts\Transfers;

interface LlgTransfer extends Transfer
{
    /**
     * Get llg transfer's transaction reference number
     *
     * @return string
     */
    public function transactionReferenceNumber();
}
