<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Identities\Identity;

interface Identities
{
    /**
     * Get identities' identity
     *
     * @return Identity
     */
    public function identity();
}
