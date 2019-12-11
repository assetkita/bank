<?php

namespace Assetku\BankService\Investa\Permatabank;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

class ApplicationInfo implements Serializeable
{
    /**
     * @var string $reffCode
     */
    protected $reffCode;

    /**
     * @var PersonalInfo $personalInfo
     */
    protected $personalInfo;

    /**
     * @param string $reffCode
     */
    public function setReffCode(string $reffCode)
    {
        $this->reffCode = $reffCode;

        return $this;
    }

    /**
     * @param PersonalInfo $personalInfo
     */
    public function setPersonalInfo(PersonalInfo $personalInfo)
    {
        $this->personalInfo = $personalInfo;

        return $this;
    }

    /**
     * @return string
     */
    public function getReffCode()
    {
        return $this->reffCode;
    }

    /**
     * @return PersonalInfo $personalInfo
     */
    public function getPersonalInfo()
    {
        return $this->personalInfo;
    }

    /**
     * serialize to array
     * 
     * @return array
     */
    public function toArray()
    {
        return [
            'ReffCode' => '',
            'PersonalInfo' => $this->personalInfo->toArray()
        ];
    }
}
