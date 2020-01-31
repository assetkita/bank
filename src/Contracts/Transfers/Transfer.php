<?php

namespace Assetku\BankService\Contracts\Transfers;

interface Transfer
{
    /**
     * Get transfer's response timestamp
     *
     * @return string
     */
    public function responseTimestamp();

    /**
     * Get transfer's customer reference id
     *
     * @return string
     */
    public function customerReferenceId();

    /**
     * Get transfer's status code
     *
     * @return string
     */
    public function statusCode();

    /**
     * Get transfer's status description
     *
     * @return string
     */
    public function statusDescription();

    /**
     * Get transfer's error
     *
     * @return string
     */
    public function error();

    /**
     * Get transfer's success status
     *
     * @return bool
     */
    public function isSuccess();
}
