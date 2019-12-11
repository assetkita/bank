<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\utils\Serialize;

use Assetku\BankService\Contracts\Serializeable;

class CasaProduct implements Serializeable
{
    use Serialize;

    protected $casaInfos = [];

    /**
     * set Casa infos
     * 
     * @param CasaInfo $casaInfo
     * @return $this
     */
    public function setCasaInfos(CasaInfo $casaInfo)
    {
        $this->casaInfos = $casaInfo;

        return $this;
    }

    public function toArray()
    {
        return $this->casaInfos->toArray();
    }
}
