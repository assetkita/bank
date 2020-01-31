<?php

namespace Assetku\BankService\Contracts\Inquiries;

interface StatusTransactionInquiry extends Inquiry
{
    /**
     * Get status transaction inquiry's transaction reference number
     *
     * @return string
     */
    public function transactionReferenceNumber();
}
