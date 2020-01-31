<?php

namespace Assetku\BankService\Contracts;

interface Encoder
{
    /**
     * Get encoder's type
     *
     * @return string
     */
    public function type();

    /**
     * Encode the given data
     *
     * @param  array  $data
     * @return string
     */
    public function encode(array $data);
}
