<?php

namespace Assetku\BankService\Contracts\Base;

use Assetku\BankService\Contracts\EncoderInterface;
use Assetku\BankService\Contracts\HeaderInterface;

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
     * @return EncoderInterface
     */
    public function encoder();

    /**
     * Get base request's header
     *
     * @return HeaderInterface
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
