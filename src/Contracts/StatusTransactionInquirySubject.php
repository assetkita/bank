<?php

namespace Assetku\BankService\Contracts;

interface StatusTransactionInquirySubject
{
    /**
     * Get status transaction inquiry's customer reference id
     *
     * @return string
     */
    public function statusTransactionInquiryCustomerReferenceId();
}
