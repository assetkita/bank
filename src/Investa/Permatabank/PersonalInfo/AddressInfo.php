<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

class AddressInfo implements Serializeable
{
    /**
     * @var $addressType
     */
    protected $addressType;

    /**
     * @var $addressLine1
     */
    protected $addressLine1;

    /**
     * @var $addressLine2
     */
    protected $addressLine2;

    /**
     * @var $addressLine3
     */
    protected $addressLine3;

    /**
     * @var $rt
     */
    protected $rt;

    /**
     * @var $rw
     */
    protected $rw;

    /**
     * @var $village
     */
    protected $village;

    /**
     * @var $subdistrict
     */
    protected $subdistrict;

    /**
     * @var $cityRegencyCode
     */
    protected $cityRegencyCode;

    /**
     * @var $province
     */
    protected $province;

    /**
     * @var $zipCode
     */
    protected $zipCode;

    /**
     * @var $country
     */
    protected $country;

    /**
     * @var $ownershipStatus
     */
    protected $ownershipStatus;

    /**
     * @var $lengthOfStayYear
     */
    protected $lengthOfStayYear;

    public function setAddressType(string $addressType)
    {
        $this->addressType = $addressType;
        
        return $this;
    }

    public function setAddressLine1(string $addressLine1)
    {
        $this->addressLine1 = str_replace(' ', '', $addressLine1);
        
        return $this;
    }

    public function setAddressLine2(string $addressLine2)
    {
        $this->addressLine2 = str_replace(' ', '', $addressLine2);
        
        return $this;
    }

    public function setAddressLine3(string $addressLine3)
    {
        $this->addressLine3 = str_replace(' ', '', $addressLine3);
        
        return $this;
    }

    public function setRt(string $rt)
    {
        $this->rt = $rt;

        return $this;
    }

    public function setRw(string $rw)
    {
        $this->rw = $rw;

        return $this;
    }

    public function setVillage(string $village)
    {
        $this->village = str_replace(' ', '', $village);

        return $this;
    }

    public function setSubdistrict(string $subdistrict)
    {
        $this->subdistrict = str_replace(' ', '', $subdistrict);

        return $this;
    }

    public function setCityRegencyCode(string $cityRegencyCode)
    {
        $this->cityRegencyCode = $cityRegencyCode;

        return $this;
    }

    public function setProvince(string $province)
    {
        $this->province = str_replace(' ', '', $province);

        return $this;
    }

    public function setZipCode(string $zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;

        return $this;
    }

    public function setOwnershipStatus(string $ownershipStatus)
    {
        $this->ownershipStatus = $ownershipStatus;

        return $this;
    }

    public function setLengthOfStayYear(string $lengthOfStayYear)
    {
        $this->lengthOfStayYear = $lengthOfStayYear;

        return $this;
    }

    public function toArray()
    {
        return [
            'AddressType' => $this->addressType,
            'AddressLine1' => $this->addressLine1,
            'AddressLine2' => $this->addressLine2,
            'AddressLine3' => $this->addressLine3,
            'Rt' => $this->rt,
            'Rw' => $this->rw,
            'Village' => $this->village,
            'Subdistrict' => $this->subdistrict,
            'CityRegencyCode' => $this->cityRegencyCode,
            'Province' => $this->province,
            'Zipcode' => $this->zipCode,
            'Country' => $this->country,
            'OwnershipStatus' => $this->ownershipStatus,
            'LengthOfStayYear' => $this->lengthOfStayYear
        ];
    }
}
