<?php

namespace Assetku\BankService\Requests\Permatabank\Headers\Contracts;

interface Header
{
    /**
     * Make request's header
     *
     * @return array
     */
    public function make();

    /**
     * Make permata signature
     *
     * @return string
     */
    public function signature();
}
