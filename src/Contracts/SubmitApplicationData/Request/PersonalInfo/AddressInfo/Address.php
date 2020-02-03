<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\AddressInfo;

interface Address
{
    /**
     * Get address's address type
     *
     * @return string
     */
    public function addressType();

    /**
     * Get address's address line 1
     *
     * @return string
     */
    public function addressLine1();

    /**
     * Get address's address line 2
     *
     * @return string
     */
    public function addressLine2();

    /**
     * Get address's address line 3
     *
     * @return string
     */
    public function addressLine3();

    /**
     * Get address's rt
     *
     * @return string
     */
    public function rt();

    /**
     * Get address's rw
     *
     * @return string
     */
    public function rw();

    /**
     * Get address's village
     *
     * @return string
     */
    public function village();

    /**
     * Get address's sub district
     *
     * @return string
     */
    public function subDistrict();

    /**
     * Get address's city regency code
     *
     * @return string
     */
    public function cityRegencyCode();

    /**
     * Get address's province
     *
     * @return string
     */
    public function province();

    /**
     * Get address's zip code
     *
     * @return string
     */
    public function zipCode();

    /**
     * Get address's country
     *
     * @return string
     */
    public function country();

    /**
     * Get address's ownership status
     *
     * @return string
     */
    public function ownershipStatus();

    /**
     * Get address's address type
     *
     * @return string
     */
    public function lengthOfStayYear();
}
