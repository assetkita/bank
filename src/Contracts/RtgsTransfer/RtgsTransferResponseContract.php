<?php

namespace Assetku\BankService\Contracts\RtgsTransfer;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface RtgsTransferResponseContract extends BaseResponseContract
{
    /**
     * Get rtgs transfer response's transaction referral number
     *
     * @return string
     */
    public function transactionReferralNumber();
}
