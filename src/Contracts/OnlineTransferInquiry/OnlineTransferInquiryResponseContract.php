<?php

namespace Assetku\BankService\Contracts\OnlineTransferInquiry;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface OnlineTransferInquiryResponseContract extends BaseResponseContract
{
    /**
     * Get online transfer inquiry response's transaction referral number
     *
     * @return string
     */
    public function transactionReferralNumber();

    /**
     * Get online transfer inquiry response's to account
     *
     * @return string
     */
    public function toAccount();

    /**
     * Get online transfer inquiry response's to account full name
     *
     * @return string
     */
    public function toAccountFullName();

    /**
     * Get online transfer inquiry response's bank id
     *
     * @return string
     */
    public function bankId();

    /**
     * Get online transfer inquiry response's bank name
     *
     * @return string
     */
    public function bankName();
}
