<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

class KycOption implements Serializeable
{
    /**
     * @var $kycType
     */
    protected $kycType;

    /**
     * @var $kycStatus
     */
    protected $kycStatus;

    /**
     * @var $additionalData
     */
    protected $additionalData;

    public function setKycType(string $kycType)
    {
        $this->kycType = $kycType;

        return $this;
    }

    public function setKycStatus(string $kycStatus)
    {
        $this->kycStatus = $kycStatus;

        return $this;
    }

    public function setAdditionalData(string $additionalData)
    {
        $this->additionalData = $additionalData;

        return $this;
    }

    public function toArray()
    {
        return [
            'KycType' => $this->kycType,
            'KYCStatus' => $this->kycStatus,
            'AdditionalData' => $this->additionalData
        ];
    }
}
