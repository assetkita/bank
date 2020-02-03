<?php

namespace Assetku\BankService\Contracts\LlgTransfer;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface LlgTransferResponseContract extends BaseResponseContract
{
    /**
     * Get llg transfer response's transaction referral number
     *
     * @return string
     */
    public function transactionReferralNumber();
}
