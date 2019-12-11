<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

class IdentityInfo implements Serializeable
{
    /**
     * @var $idType
     */
    protected $idType;

    /**
     * @var $idExpiryDate
     */
    protected $idExpiryDate;

    /**
     * @var $idName
     */
    protected $idName;

    /**
     * @var $idNumber
     */
    protected $idNumber;

    public function setIdType(string $idType)
    {
        $this->idType = $idType;

        return $this;
    }

    public function setIdExpiryDate(string $idExpiryDate)
    {
        $this->idExpiryDate = $idExpiryDate;

        return $this;
    }

    public function setIdName(string $idName)
    {
        $this->idName = str_replace(' ', '', $idName);
        
        return $this;
    }

    public function setIdNumber(string $idNumber)
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    public function toArray()
    {
        return [
            'IDType' => $this->idType,
            'IDExpiryDate' => $this->idExpiryDate,
            'IDName' => $this->idName,
            'IDNumber' => $this->idNumber
        ];
    }
}
