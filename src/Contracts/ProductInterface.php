<?php

namespace Assetku\BankService\Contracts;

interface ProductInterface
{
    /**
     * Get product's type
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
