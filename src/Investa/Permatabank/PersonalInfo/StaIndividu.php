<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

class StaIndividu implements Serializeable
{
    /**
     * @var $customerName
     */
    protected $customerName;

    /**
     * @var $cityOfBirth
     */
    protected $cityOfBirth;

    /**
     * @var $countryOfBirth
     */
    protected $countryOfBirth;

    /**
     * @var $dateOfBirth
     */
    protected $dateOfBirth;

    /**
     * @var $gender
     */
    protected $gender;

    /**
     * @var $maritalStatus
     */
    protected $maritalStatus;

    /**
     * @var $lastEducationStatus
     */
    protected $lastEducationStatus;

    /**
     * @var $noOfDependant
     */
    protected $noOfDependant;

    /**
     * @var $nationality
     */
    protected $nationality;

    /**
     * @var $emailAddress
     */
    protected $emailAddress;

    /**
     * @var $motherMaidenName
     */
    protected $motherMaidenName;

    /**
     * @var $residentStatus
     */
    protected $residentStatus;

    /**
     * @var $flagASCASA
     */
    protected $flagASCASA;

    /**
     * @var $depositTrxCount
     */
    protected $depositTrxCount;

    /**
     * @var $depositTrxAmount
     */
    protected $depositTrxAmount;

    /**
     * @var $withdrawalTrxCount
     */
    protected $withdrawalTrxCount;

    /**
     * @var $withdrawalTrxAmount
     */
    protected $withdrawalTrxAmount;

    /**
     * @var $promoCode
     */
    protected $promoCode;

    public function setCustomerName(string $customerName)
    {
        $this->customerName = str_replace(' ', '', $customerName);

        return $this;
    }

    public function setCityOfBirth(string $cityOfBirth)
    {
        $this->cityOfBirth = $cityOfBirth;

        return $this;
    }

    public function setDateofBirth(string $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function setCountryOfBirth(string $countryOfBirth)
    {
        $this->countryOfBirth = $countryOfBirth;

        return $this;
    }

    public function setGender(string $gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function setLastEducationStatus(string $lastEducationStatus)
    {
        $this->lastEducationStatus = $lastEducationStatus;

        return $this;
    }

    public function setMaritalStatus(string $maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    public function setNationality(string $nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function setEmailAddress(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function setMotherMaidenName(string $motherMaidenName)
    {
        $this->motherMaidenName = str_replace(' ', '', $motherMaidenName);

        return $this;
    }

    public function setResidentStatus(string $residentStatus)
    {
        $this->residentStatus = $residentStatus;

        return $this;
    }

    public function setFlagASCASA(string $flagASCASA)
    {
        $this->flagASCASA = $flagASCASA;

        return $this;
    }

    public function setDepositTrxCount(string $depositTrxCount)
    {
        $this->depositTrxCount = $depositTrxCount;

        return $this;
    }

    public function setDepositTrxAmount(string $depositTrxAmount)
    {
        $this->depositTrxAmount = $depositTrxAmount;

        return $this;
    }

    public function setWithdrawalTrxCount(string $withdrawalTrxCount)
    {
        $this->withdrawalTrxCount = $withdrawalTrxCount;

        return $this;
    }

    public function setWithdrawalTrxAmount(string $withdrawalTrxAmount)
    {
        $this->withdrawalTrxAmount = $withdrawalTrxAmount;

        return $this;
    }

    public function setPromoCode(string $promoCode)
    {
        $this->promoCode = $promoCode;

        return $this;
    }

    public function setNoOfDependant(string $noOfDependant)
    {
        $this->noOfDependant = $noOfDependant;

        return $this;
    }

    public function toArray()
    {
        return [
            'CustomerName' => $this->customerName,
            'CityOfBirth' => $this->cityOfBirth,
            'DateOfBirth' => $this->dateOfBirth,
            'CountryOfBirth' => $this->countryOfBirth,
            'Gender' => $this->gender,
            'MaritalStatus' => $this->maritalStatus,
            'LastEducationStatus' => $this->lastEducationStatus,
            'NoOfDependant' => $this->noOfDependant,
            'Nationality' => $this->nationality,
            'EmailAddress' => $this->emailAddress,
            'MotherMaidenName' => $this->motherMaidenName,
            'ResidentStatus' => $this->residentStatus,
            'FlagASCASA' => $this->flagASCASA,
            'DepositTrxCount' => $this->depositTrxCount,
            'DepositTrxAmount' => $this->depositTrxAmount,
            'WithdrawalTrxCount' => $this->withdrawalTrxCount,
            'WithdrawalTrxAmount' => $this->withdrawalTrxAmount,
            'PromoCode' => $this->promoCode
        ];
    }
}
