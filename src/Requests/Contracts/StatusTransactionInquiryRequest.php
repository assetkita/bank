<?php

namespace Assetku\BankService\Requests\Contracts;

interface StatusTransactionInquiryRequest extends Request
{
    /**
     * Get status transaction inquiry request's customer reference id
     *
     * @return string
     */
    public function customerReferenceId();
}
