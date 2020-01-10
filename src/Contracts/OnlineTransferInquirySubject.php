<?php

namespace Assetku\BankService\Contracts;

interface OnlineTransferInquirySubject
{
    /**
     * Get online transfer inquiry's to account
     *
     * @return string
     */
    public function onlineTransferInquiryToAccount();

    /**
     * Get online transfer inquiry's bank id
     *
     * @return string
     */
    public function onlineTransferInquiryBankId();

    /**
     * Get online transfer inquiry's bank name
     *
     * @return string
     */
    public function onlineTransferInquiryBankName();
}
