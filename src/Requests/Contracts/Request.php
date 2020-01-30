<?php

namespace Assetku\BankService\Requests\Contracts;

use Assetku\BankService\Requests\Permatabank\Encoders\Contracts\Encoder;
use Assetku\BankService\Requests\Permatabank\Headers\Contracts\Header;

interface Request
{
    /**
     * Get request's method
     *
     * @return string
     */
    public function method();

    /**
     * Get request's uri
     *
     * @return string
     */
    public function uri();

    /**
     * Get request's encoder
     *
     * @return Encoder
     */
    public function encoder();

    /**
     * Get request's data
     *
     * @return array
     */
    public function data();

    /**
     * Get request's header
     *
     * @return Header
     */
    public function header();

    /**
     * Get request's timestamp
     *
     * @return string
     */
    public function timestamp();
}
