<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\AddressInfo\Address;

interface AddressInfo
{
    /**
     * Get address info's addresses
     *
     * @return Address[]
     */
    public function addresses();
}
