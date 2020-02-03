<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\PhoneInfo\Phone;

interface PhoneInfo
{
    /**
     * Get phone info's phones
     *
     * @return Phone[]
     */
    public function phones();
}
