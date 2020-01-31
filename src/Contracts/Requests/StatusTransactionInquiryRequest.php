<?php

namespace Assetku\BankService\Contracts\Requests;

interface StatusTransactionInquiryRequest extends Request
{
    /**
     * Get status transaction inquiry request's customer reference id
     *
     * @return string
     */
    public function customerReferenceId();
}
