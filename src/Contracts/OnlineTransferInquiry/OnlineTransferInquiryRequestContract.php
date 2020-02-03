<?php

namespace Assetku\BankService\Contracts\OnlineTransferInquiry;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface OnlineTransferInquiryRequestContract extends BaseRequestContract
{
    /**
     * Get online transfer inquiry request's to to account
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
