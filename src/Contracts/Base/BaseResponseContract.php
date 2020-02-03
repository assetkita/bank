<?php

namespace Assetku\BankService\Contracts\Base;

interface BaseResponseContract
{
    /**
     * Get base response's response timestamp
     *
     * @return string
     */
    public function responseTimestamp();

    /**
     * Get base response's customer referral id
     *
     * @return string
     */
    public function customerReferralId();

    /**
     * Get base response's status code
     *
     * @return string
     */
    public function statusCode();

    /**
     * Get base response's status description
     *
     * @return string
     */
    public function statusDescription();

    /**
     * Get base response's error
     *
     * @return string
     */
    public function error();

    /**
     * Get base response's success status
     *
     * @return bool
     */
    public function isSuccess();
}
