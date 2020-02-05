<?php

namespace Assetku\BankService\Contracts\AccountValidationInquiry;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface AccountValidationInquiryResponseContract extends BaseResponseContract
{
    /**
     * Get application validation inquiry response's validation status
     *
     * @return bool
     */
    public function validationStatus();
}
