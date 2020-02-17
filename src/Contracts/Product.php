<?php

namespace Assetku\BankService\Contracts;

interface Product
{
    /**
     * Get product's product type
     *
     * @return string
     */
    public function productType();

    /**
     * Get product's account number
     *
     * @return string
     */
    public function accountNumber();
}
