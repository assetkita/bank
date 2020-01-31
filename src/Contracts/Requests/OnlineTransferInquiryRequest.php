<?php

namespace Assetku\BankService\Contracts\Requests;

interface OnlineTransferInquiryRequest extends Request
{
    /**
     * Get online transfer inquiry request's to toAccount
     *
     * @return string
     */
    public function toAccount();

    /**
     * Get online transfer inquiry request's bank id
     *
     * @return string
     */
    public function bankId();

    /**
     * Get online transfer inquiry request's bank name
     *
     * @return string
     */
    public function bankName();
}
