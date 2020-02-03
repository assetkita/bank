<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Products\Product;

interface Products
{
    /**
     * Get products' products
     *
     * @return Product[]
     */
    public function products();
}
