<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\utils\Serialize;
use Assetku\BankService\Contracts\Serializeable;

class PersonalInfo implements Serializeable
{
    use Serialize;

    /**
     * @var $kycOption
     */
    protected $kycOption;

    /**
     * @var $identityInfo
     */
    protected $identity;

    /**
     * @var $employements
     */
    protected $employments;

    /**
     * @var Product[]
     */
    protected $products;

    /**
     * @var PhoneInfo[]
     */
    protected $phoneInfos;

    /**
     * @var AddressInfo[]
     */
    protected $addressInfos;

    /**
     * @var $staIndividu
     */
    protected $staIndividu;

    /**
     * serialize to array
     * 
     * @return array
     */
    public function toArray()
    {
        return [
            'StaIndividu' => $this->staIndividu->toArray(),
            'AddressInfo' => $this->mapSerialize($this->addressInfos),
            'PersonalInfo' => $this->mapSerialize($this->phoneInfos),
            'Products' => $this->mapSerialize($this->products),
            'Employments' => $this->employments->toArray(),
            'Identities' => $this->identity->toArray(),
            'KYCOption' => $this->kycOption->toArray(),
        ];
    }
    
    public function setAddressInfos(AddressInfo $addressInfo)
    {
        $this->addressInfos[] = $addressInfo;

        return $this;
    }

    public function setPhoneInfos(PhoneInfo $phoneInfo)
    {
        $this->phoneInfos[] = $phoneInfo;

        return $this;
    }

    public function setStaIndividu(StaIndividu $staIndividu)
    {
        $this->staIndividu = $staIndividu;

        return $this;
    }

    public function setProducts(Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    public function setEmployments(Employment $employment)
    {
        $this->employments = $employment;

        return $this;
    }

    public function setIdentities(Identity $identity)
    {
        $this->identity = $identity;

        return $this;
    }

    public function setKycOption(KycOption $kycOption)
    {
        $this->kycOption = $kycOption;

        return $this;
    }
}
