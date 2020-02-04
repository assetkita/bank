<?php

namespace Assetku\BankService\Contracts\ApplicationStatusInquiry;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface ApplicationStatusInquiryResponseContract extends BaseRequestContract
{
    /**
     * Get refferal code response's.
     *
     * @return string
     */
    public function refferalCode();
}