<?php

namespace Assetku\BankService\Contracts\Inquiries;

interface OnlineTransferInquiry extends Inquiry
{
    /**
     * Get online transfer inquiry's transaction reference number
     *
     * @return string
     */
    public function transactionReferenceNumber();

    /**
     * Get online transfer inquiry's to account
     *
     * @return string
     */
    public function toAccount();

    /**
     * Get online transfer inquiry's to account full name
     *
     * @return string
     */
    public function toAccountFullName();

    /**
     * Get online transfer inquiry's bank id
     *
     * @return string
     */
    public function bankId();

    /**
     * Get online transfer inquiry's bank name
     *
     * @return string
     */
    public function bankName();
}
