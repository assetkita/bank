<?php

namespace Assetku\BankService\NotifAccountOpeningStatus\Permatabank;

use Assetku\BankService\Contracts\ProductInterface;

class Product implements ProductInterface
{
    /**
     * @var string
     */
    protected $productType;
    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * Product constructor.
     *
     * @param  string  $productType
     * @param  string  $accountNumber
     */
    public function __construct(string $productType, string $accountNumber)
    {
        $this->productType = $productType;

        $this->accountNumber = $accountNumber;
    }

    /**
     * Get product's type
     *
     * @return string
     */
    public function productType()
    {
        return $this->productType;
    }

    /**
     * Get product's account number
     *
     * @return string
     */
    public function accountNumber()
    {
        return $this->accountNumber;
    }
}
