<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

use Assetku\BankService\utils\Serialize;

class Identity implements Serializeable
{
    use Serialize;

    /**
     * @var IndentityInfo[]
     */
    protected $identitiesInfo;

    /**
     * set identities Info
     * 
     * @param  IndentityInfo[]  $identitesInfo
     */
    public function setIdentitiesInfo(IdentityInfo $identitiesInfo)
    {
        $this->identitiesInfo[] = $identitiesInfo;
        
        return $this;
    }

    public function toArray()
    {
        return [
            'IdentitiesInfo' => $this->mapSerialize($this->identitiesInfo)
        ];
    }
}
