<?php

namespace Assetku\BankService\Contracts\OnlineTransfer;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface OnlineTransferResponseContract extends BaseResponseContract
{
    /**
     * Get online transfer response's transaction referral number
     *
     * @return string
     */
    public function transactionReferralNumber();
}
