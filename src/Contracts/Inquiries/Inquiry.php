<?php

namespace Assetku\BankService\Contracts\Inquiries;

interface Inquiry
{
    /**
     * Get inquiry's response timestamp
     *
     * @return string
     */
    public function responseTimestamp();

    /**
     * Get inquiry's customer reference id
     *
     * @return string
     */
    public function customerReferenceId();

    /**
     * Get inquiry's status code
     *
     * @return string
     */
    public function statusCode();

    /**
     * Get inquiry's status description
     *
     * @return string
     */
    public function statusDescription();

    /**
     * Get inquiry's error
     *
     * @return string
     */
    public function error();

    /**
     * Get inquiry's success status
     *
     * @return bool
     */
    public function isSuccess();
}
