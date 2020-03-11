<?php

namespace Assetku\BankService\Contracts;

interface HeaderInterface
{
    /**
     * Get header's content
     *
     * @return array
     */
    public function content();

    /**
     * Get header's signature
     *
     * @return string
     */
    public function signature();
}
