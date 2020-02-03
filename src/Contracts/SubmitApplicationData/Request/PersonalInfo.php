<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\AddressInfo;
use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Employments;
use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Identities;
use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\KycOption;
use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\PhoneInfo;
use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Products;
use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\StaIndividu;

interface PersonalInfo
{
    /**
     * Get personal info's sta individu
     *
     * @return StaIndividu
     */
    public function staIndividu();

    /**
     * Get personal info's address info
     *
     * @return AddressInfo
     */
    public function addressInfo();

    /**
     * Get personal info's phone info
     *
     * @return PhoneInfo
     */
    public function phoneInfo();

    /**
     * Get personal info's products
     *
     * @return Products
     */
    public function products();

    /**
     * Get personal info's employments
     *
     * @return Employments
     */
    public function employments();

    /**
     * Get personal info's identities
     *
     * @return Identities
     */
    public function identities();

    /**
     * Get personal info's kyc option
     *
     * @return KycOption
     */
    public function kycOption();
}
