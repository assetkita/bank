<?php

namespace Assetku\BankService\Investa\Permatabank\CheckRegistrationStatus;

class Product
{
    /**
     * @var string
     */
    const PRODUCT_STATUS_IN_PROGRESS = 'IN-PROGRESS';

    /**
     * @var string
     */
    const PRODUCT_STATUS_IN_PROCESS = 'IN PROCESS';

    /**
     * @var string
     */
    protected $productType;

    /**
     * @var string
     */
    protected $productStatus;

    /**
     * constructor
     * 
     * @param object $applicationStatus
     */
    public function __construct($applicationStatus)
    {
        $this->productType = $applicationStatus->ProductType;

        $this->productStatus = $applicationStatus->ProductStatus;
    }

    /**
     * Get product type
     * 
     * @return string $productType
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Get product status
     * 
     * @return string $productStatus
     */
    public function getProductStatus()
    {
        return $this->productStatus;
    }

    /**
     * When status is in progress
     * 
     * @return string
     */
    public function isProductStatusInProgress()
    {
        return $this->productStatus === self::PRODUCT_STATUS_IN_PROGRESS;
    }

    /**
     * When status is in process
     * 
     * @return string
     */
    public function isProductStatusInProcess()
    {
        return $this->productStatus === self::PRODUCT_STATUS_IN_PROCESS;
    }
}
