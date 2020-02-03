<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Products\Product;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Products\Product\CasaProduct\AdditionalCasaInfo;

interface CasaProduct
{
    /**
     * Get casa product's sequence number
     *
     * @return string
     */
    public function sequenceNumber();

    /**
     * Get casa product's Sta product code
     *
     * @return string
     */
    public function staProductCode();

    /**
     * Get casa product's product family
     *
     * @return string
     */
    public function productFamily();

    /**
     * Get casa product's product type
     *
     * @return string
     */
    public function productType();

    /**
     * Get casa product's branch id
     *
     * @return string
     */
    public function branchId();

    /**
     * Get casa product's source
     *
     * @return string
     */
    public function source();

    /**
     * Get casa product's purpose
     *
     * @return string
     */
    public function purpose();

    /**
     * Get casa product's purpose other
     *
     * @return string
     */
    public function purposeOther();

    /**
     * Get casa product's opening
     *
     * @return string
     */
    public function opening();

    /**
     * Get casa product's opening other
     *
     * @return string
     */
    public function openingOther();

    /**
     * Get casa product's address statement
     *
     * @return string
     */
    public function addressStatement();

    /**
     * Get casa product's additional casa info
     *
     * @return AdditionalCasaInfo
     */
    public function additionalCasaInfo();
}
