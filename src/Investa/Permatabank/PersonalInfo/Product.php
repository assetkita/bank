<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

use Assetku\BankService\utils\Serialize;

class Product implements Serializeable
{
    use Serialize;
    
    /**
     * @var CasaProduct[]
     */
    protected $casaProducts;

    /**
     * set casa product property
     * 
     * @param  CasaProduct[]  $casaProduct
     */
    public function setCasaProducts(CasaProduct $casaProduct)
    {
        $this->casaProducts[] = $casaProduct;

        return $this;
    }

    public function toArray()
    {
        return [
            'CasaProducts' => $this->mapSerialize($this->casaProducts),
        ];
    }
}
