<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Identities;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Identities\Identity\IdentityInfo;

interface Identity
{
    /**
     * Get identity's identity infos
     *
     * @return IdentityInfo[]
     */
    public function identityInfos();
}
