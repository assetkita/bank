<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Products;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Products\Product\CasaProduct;

interface Product
{
    /**
     * Get product's casa products
     *
     * @return CasaProduct[]
     */
    public function casaProducts();
}
