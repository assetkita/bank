<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

class PhoneInfo implements Serializeable
{
    /**
     * @var $phoneType
     */
    protected $phoneType;

    /**
     * @var $phoneAreaCode
     */
    protected $phoneAreaCode;

    /**
     * @var $phoneNumber1
     */
    protected $phoneNumber1;

    /**
     * @var $phoneExt
     */
    protected $phoneExt;

    public function setPhoneType($phoneType)
    {
        $this->phoneType = $phoneType;

        return $this;
    }

    public function setPhoneAreaCode($phoneAreaCode)
    {
        $this->phoneAreaCode = $phoneAreaCode;

        return $this;
    }

    public function setPhoneNumber1($phoneNumber1)
    {
        $this->phoneNumber1 = $phoneNumber1;

        return $this;
    }

    public function setPhoneExt($phoneExt)
    {
        $this->phoneExt = $phoneExt;

        return $this;
    }

    public function toArray()
    {
        return [
            'PhoneType' => $this->phoneType,
            'PhoneAreaCode' => $this->phoneAreaCode,
            'PhoneNumber1' => $this->phoneNumber1,
            'PhoneExt' => $this->phoneExt
        ];
    }
}
