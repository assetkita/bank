<?php

namespace Assetku\BankService\Contracts\ApplicationStatusInquiry;

use Assetku\BankService\ApplicationStatusInquiry\Permatabank\ApplicationStatusProduct;
use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface ApplicationStatusInquiryResponseContract extends BaseResponseContract
{
    /**
     * Get application status inquiry response's referral code
     *
     * @return string
     */
    public function referralCode();

    /**
     * Get application status inquiry response's application status products
     *
     * @return array
     */
    public function applicationStatusProducts();
}
