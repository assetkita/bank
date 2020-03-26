<?php

namespace Assetku\BankService\Contracts\AccountValidationInquiry;

use Assetku\BankService\Contracts\Base\BaseResponseContract;

interface AccountValidationInquiryResponseContract extends BaseResponseContract
{
    /**
     * Get application validation inquiry response's validation status
     *
     * @return string
     */
    public function validationStatus();

    /**
     * Determine whether application validation inquiry response's is match
     *
     * @return bool
     */
    public function isMatch();

    /**
     * Determine whether application validation inquiry response's is new to bank
     *
     * @return bool
     */
    public function isNTB();

    /**
     * Determine whether application validation inquiry response's is not match
     *
     * @return bool
     */
    public function isNotMatch();

    /**
     * Determine whether application validation inquiry response's is existing to bank
     *
     * @return bool
     */
    public function isETB();
}
