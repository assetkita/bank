<?php

namespace Assetku\BankService\Contracts\Base;

use Assetku\BankService\Contracts\EncoderContract;
use Assetku\BankService\Contracts\HeaderContract;

interface BaseRequestContract
{
    /**
     * Get base request's method
     *
     * @return string
     */
    public function method();

    /**
     * Get base request's uri
     *
     * @return string
     */
    public function uri();

    /**
     * Get base request's encoder
     *
     * @return EncoderContract
     */
    public function encoder();

    /**
     * Get base request's header
     *
     * @return HeaderContract
     */
    public function header();

    /**
     * Get base request's timestamp
     *
     * @return string
     */
    public function timestamp();

    /**
     * Get base request's data
     *
     * @return array
     */
    public function data();
}
