<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Identities\Identity;

interface IdentityInfo
{
    /**
     * Get identity info's id type
     *
     * @return string
     */
    public function idType();

    /**
     * Get identity info's id expiry date
     *
     * @return string
     */
    public function idExpiryDate();

    /**
     * Get identity info's id name
     *
     * @return string
     */
    public function idName();

    /**
     * Get identity info's id number
     *
     * @return string
     */
    public function idNumber();
}
