<?php

namespace Assetku\BankService\SubmitApplicationData\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\Subjects\SubmitApplicationDataSubject;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class SubmitApplicationDataRequest extends BaseRequest implements SubmitApplicationDataRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $referralCode = '';

    /**
     * @var string
     */
    protected $customerName;

    /**
     * @var string
     */
    protected $cityOfBirth;

    /**
     * @var string
     */
    protected $dateOfBirth;

    /**
     * @var string
     */
    protected $countryOfBirth = 'ID';

    /**
     * @var string
     */
    protected $gender;

    /**
     * @var string
     */
    protected $maritalStatus;

    /**
     * @var string
     */
    protected $lastEducationStatus;

    /**
     * @var string
     */
    protected $noOfDependant = '01';

    /**
     * @var string
     */
    protected $nationality = 'ID';

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var string
     */
    protected $motherMaidenName;

    /**
     * @var string
     */
    protected $residentStatus = 'R';

    /**
     * @var string
     */
    protected $flagASCASA = 'Y';

    /**
     * @var string
     */
    protected $depositTransactionCount = '010';

    /**
     * @var string
     */
    protected $depositTransactionAmount = '010';

    /**
     * @var string
     */
    protected $withdrawalTransactionCount = '010';

    /**
     * @var string
     */
    protected $withdrawalTransactionAmount = '010';

    /**
     * @var string
     */
    protected $promoCode = '';

    /**
     * @var string
     */
    protected $idAddressType = '01';

    /**
     * @var string
     */
    protected $idAddressLine1;

    /**
     * @var string
     */
    protected $idAddressLine2;

    /**
     * @var string
     */
    protected $idAddressLine3 = '';

    /**
     * @var string
     */
    protected $idRt;

    /**
     * @var string
     */
    protected $idRw;

    /**
     * @var string
     */
    protected $idVillage;

    /**
     * @var string
     */
    protected $idSubDistrict;

    /**
     * @var string
     */
    protected $idCityRegencyCode;

    /**
     * @var string
     */
    protected $idProvince;

    /**
     * @var string
     */
    protected $idZipCode;

    /**
     * @var string
     */
    protected $idCountry = 'ID';

    /**
     * @var string
     */
    protected $idOwnershipStatus = '1';

    /**
     * @var string
     */
    protected $idLengthOfStayYear = '25';

    /**
     * @var string
     */
    protected $idLengthOfStayMonth = '12';

    /**
     * @var string
     */
    protected $domicileAddressType = '02';

    /**
     * @var string
     */
    protected $domicileAddressLine1;

    /**
     * @var string
     */
    protected $domicileAddressLine2;

    /**
     * @var string
     */
    protected $domicileAddressLine3 = '';

    /**
     * @var string
     */
    protected $domicileRt;

    /**
     * @var string
     */
    protected $domicileRw;

    /**
     * @var string
     */
    protected $domicileVillage;

    /**
     * @var string
     */
    protected $domicileSubDistrict;

    /**
     * @var string
     */
    protected $domicileCityRegencyCode;

    /**
     * @var string
     */
    protected $domicileProvince;

    /**
     * @var string
     */
    protected $domicileZipCode;

    /**
     * @var string
     */
    protected $domicileCountry = 'ID';

    /**
     * @var string
     */
    protected $domicileOwnershipStatus = '1';

    /**
     * @var string
     */
    protected $domicileLengthOfStayYear = '25';

    /**
     * @var string
     */
    protected $domicileLengthOfStayMonth = '12';

    /**
     * @var string
     */
    protected $workAddressType = '06';

    /**
     * @var string
     */
    protected $workAddressLine1;

    /**
     * @var string
     */
    protected $workAddressLine2;

    /**
     * @var string
     */
    protected $workAddressLine3 = '';

    /**
     * @var string
     */
    protected $workRt;

    /**
     * @var string
     */
    protected $workRw;

    /**
     * @var string
     */
    protected $workVillage;

    /**
     * @var string
     */
    protected $workSubDistrict;

    /**
     * @var string
     */
    protected $workCityRegencyCode;

    /**
     * @var string
     */
    protected $workProvince;

    /**
     * @var string
     */
    protected $workZipCode;

    /**
     * @var string
     */
    protected $workCountry = 'ID';

    /**
     * @var string
     */
    protected $workOwnershipStatus = '1';

    /**
     * @var string
     */
    protected $workLengthOfStayYear = '25';

    /**
     * @var string
     */
    protected $workLengthOfStayMonth = '12';

    /**
     * @var string
     */
    protected $homePhoneType = 'HOMEPHONE1';

    /**
     * @var string
     */
    protected $homePhoneAreaCode;

    /**
     * @var string
     */
    protected $homePhoneNumber;

    /**
     * @var string
     */
    protected $homePhoneExtension = '0000';

    /**
     * @var string
     */
    protected $handPhoneType = 'HP1';

    /**
     * @var string
     */
    protected $handPhoneAreaCode;

    /**
     * @var string
     */
    protected $handPhoneNumber;

    /**
     * @var string
     */
    protected $handPhoneExtension = '0000';

    /**
     * @var string
     */
    protected $officePhoneType = 'OFFICEPHONE1';

    /**
     * @var string
     */
    protected $officePhoneAreaCode;

    /**
     * @var string
     */
    protected $officePhoneNumber;

    /**
     * @var string
     */
    protected $officePhoneExtension = '0000';

    /**
     * @var string
     */
    protected $sequenceNumber = '1';

    /**
     * @var string
     */
    protected $staProductCode = 'TR016';

    /**
     * @var string
     */
    protected $productFamily = 'SavingO';

    /**
     * @var string
     */
    protected $productType = 'UI';

    /**
     * @var string
     */
    protected $branchId = '0204';

    /**
     * @var string
     */
    protected $source = 'U';

    /**
     * @var string
     */
    protected $purpose = '4';

    /**
     * @var string
     */
    protected $purposeOther = '';

    /**
     * @var string
     */
    protected $opening = '3';

    /**
     * @var string
     */
    protected $openingOther = '';

    /**
     * @var string
     */
    protected $addressStatement = '02';

    /**
     * @var string
     */
    protected $SID = '';

    /**
     * @var string
     */
    protected $subAccountEfek = '';

    /**
     * @var string
     */
    protected $corpEfekPenerimaKuasa = '';

    /**
     * @var string
     */
    protected $currencyType = '';

    /**
     * @var string
     */
    protected $groupIdHeadToHead;

    /**
     * @var string
     */
    protected $groupIdPEB = 'D628760001L';

    /**
     * @var string
     */
    protected $employmentType;

    /**
     * @var string
     */
    protected $position;

    /**
     * @var string
     */
    protected $department;

    /**
     * @var string
     */
    protected $employmentStatus = '1';

    /**
     * @var string
     */
    protected $economySector;

    /**
     * @var string
     */
    protected $economySectorOthers = '';

    /**
     * @var string
     */
    protected $lengthOfServiceYear = '02';

    /**
     * @var string
     */
    protected $lengthOfServiceMonth = '02';

    /**
     * @var string
     */
    protected $monthlyIncomeCode;

    /**
     * @var string
     */
    protected $monthlyIncome;

    /**
     * @var string
     */
    protected $companyName;

    /**
     * @var string
     */
    protected $sourceOfFund;

    /**
     * @var string
     */
    protected $sourceOfFundOther = '';

    /**
     * @var string
     */
    protected $idType = 'KT';

    /**
     * @var string
     */
    protected $idExpiryDate = '9999-12-31';

    /**
     * @var string
     */
    protected $idName;

    /**
     * @var string
     */
    protected $idNumber;

    /**
     * @var string
     */
    protected $kycType = '7';

    /**
     * @var string
     */
    protected $kycStatus = 'Success';

    /**
     * @var string
     */
    protected $additionalData = '';

    /**
     * SubmitApplicationDataRequest constructor.
     *
     * @param  SubmitApplicationDataSubject  $subject
     */
    public function __construct(SubmitApplicationDataSubject $subject)
    {
        $environment = \App::environment('production') ? 'production' : 'development';

        parent::__construct();

        $this->customerName = $subject->customerName();

        $this->cityOfBirth = $subject->cityOfBirth();

        $this->dateOfBirth = $subject->dateOfBirth();

        $this->gender = $subject->gender();

        $this->maritalStatus = $subject->maritalStatus();

        $this->lastEducationStatus = $subject->lastEducationStatus();

        $this->emailAddress = $subject->emailAddress();

        $this->motherMaidenName = $subject->motherMaidenName();

        $this->idAddressLine1 = $subject->idAddressLine1();

        $this->idAddressLine2 = $subject->idAddressLine2();

        $this->idRt = $subject->idRt();

        $this->idRw = $subject->idRw();

        $this->idVillage = $subject->idVillage();

        $this->idSubDistrict = $subject->idSubDistrict();

        $this->idCityRegencyCode = $subject->idCityRegencyCode();

        $this->idProvince = $subject->idProvince();

        $this->idZipCode = $subject->idZipCode();

        $this->domicileAddressLine1 = $subject->domicileAddressLine1();

        $this->domicileAddressLine2 = $subject->domicileAddressLine2();

        $this->domicileRt = $subject->domicileRt();

        $this->domicileRw = $subject->domicileRw();

        $this->domicileVillage = $subject->domicileVillage();

        $this->domicileSubDistrict = $subject->domicileSubDistrict();

        $this->domicileCityRegencyCode = $subject->domicileCityRegencyCode();

        $this->domicileProvince = $subject->domicileProvince();

        $this->domicileZipCode = $subject->domicileZipCode();

        $this->workAddressLine1 = $subject->workAddressLine1();

        $this->workAddressLine2 = $subject->workAddressLine2();

        $this->workRt = $subject->workRt();

        $this->workRw = $subject->workRw();

        $this->workVillage = $subject->workVillage();

        $this->workSubDistrict = $subject->workSubDistrict();

        $this->workCityRegencyCode = $subject->workCityRegencyCode();

        $this->workProvince = $subject->workProvince();

        $this->workZipCode = $subject->workZipCode();

        $this->homePhoneAreaCode = $subject->homePhoneAreaCode();

        $this->homePhoneNumber = $subject->homePhoneNumber();

        $this->handPhoneAreaCode = $subject->handPhoneAreaCode();

        $this->handPhoneNumber = $subject->handPhoneNumber();

        $this->officePhoneAreaCode = $subject->officePhoneAreaCode();

        $this->officePhoneNumber = $subject->officePhoneNumber();

        $this->groupIdHeadToHead = \Config::get("bank.providers.permatabank.{$environment}.group_id");

        $this->employmentType = $subject->employmentType();

        $this->economySector = $subject->economySector();

        $this->position = $subject->position();

        $this->department = $subject->department();

        $this->monthlyIncomeCode = $subject->monthlyIncomeCode();

        $this->monthlyIncome = $subject->monthlyIncome();

        $this->companyName = $subject->companyName();

        $this->sourceOfFund = $subject->sourceOfFund();

        $this->idName = $subject->idName();

        $this->idNumber = $subject->idNumber();
    }

    /**
     * @inheritDoc
     */
    public function referralCode()
    {
        return $this->referralCode;
    }

    /**
     * @inheritDoc
     */
    public function customerName()
    {
        return $this->customerName;
    }

    /**
     * @inheritDoc
     */
    public function cityOfBirth()
    {
        return $this->cityOfBirth;
    }

    /**
     * @inheritDoc
     */
    public function dateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @inheritDoc
     */
    public function countryOfBirth()
    {
        return $this->countryOfBirth;
    }

    /**
     * @inheritDoc
     */
    public function gender()
    {
        return $this->gender;
    }

    /**
     * @inheritDoc
     */
    public function maritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * @inheritDoc
     */
    public function lastEducationStatus()
    {
        return $this->lastEducationStatus;
    }

    /**
     * @inheritDoc
     */
    public function noOfDependant()
    {
        return $this->noOfDependant;
    }

    /**
     * @inheritDoc
     */
    public function nationality()
    {
        return $this->nationality;
    }

    /**
     * @inheritDoc
     */
    public function emailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @inheritDoc
     */
    public function motherMaidenName()
    {
        return $this->motherMaidenName;
    }

    /**
     * @inheritDoc
     */
    public function residentStatus()
    {
        return $this->residentStatus;
    }

    /**
     * @inheritDoc
     */
    public function flagASCASA()
    {
        return $this->flagASCASA;
    }

    /**
     * @inheritDoc
     */
    public function depositTransactionCount()
    {
        return $this->depositTransactionCount;
    }

    /**
     * @inheritDoc
     */
    public function depositTransactionAmount()
    {
        return $this->depositTransactionAmount;
    }

    /**
     * @inheritDoc
     */
    public function withdrawalTransactionCount()
    {
        return $this->withdrawalTransactionCount;
    }

    /**
     * @inheritDoc
     */
    public function withdrawalTransactionAmount()
    {
        return $this->withdrawalTransactionAmount;
    }

    /**
     * @inheritDoc
     */
    public function promoCode()
    {
        return $this->promoCode;
    }

    /**
     * @inheritDoc
     */
    public function idAddressType()
    {
        return $this->idAddressType;
    }

    /**
     * @inheritDoc
     */
    public function idAddressLine1()
    {
        return $this->idAddressLine1;
    }

    /**
     * @inheritDoc
     */
    public function idAddressLine2()
    {
        return $this->idAddressLine2;
    }

    /**
     * @inheritDoc
     */
    public function idAddressLine3()
    {
        return $this->idAddressLine3;
    }

    /**
     * @inheritDoc
     */
    public function idRt()
    {
        return $this->idRt;
    }

    /**
     * @inheritDoc
     */
    public function idRw()
    {
        return $this->idRw;
    }

    /**
     * @inheritDoc
     */
    public function idVillage()
    {
        return $this->idVillage;
    }

    /**
     * @inheritDoc
     */
    public function idSubDistrict()
    {
        return $this->idSubDistrict;
    }

    /**
     * @inheritDoc
     */
    public function idCityRegencyCode()
    {
        return $this->idCityRegencyCode;
    }

    /**
     * @inheritDoc
     */
    public function idProvince()
    {
        return $this->idProvince;
    }

    /**
     * @inheritDoc
     */
    public function idZipCode()
    {
        return $this->idZipCode;
    }

    /**
     * @inheritDoc
     */
    public function idCountry()
    {
        return $this->idCountry;
    }

    /**
     * @inheritDoc
     */
    public function idOwnershipStatus()
    {
        return $this->idOwnershipStatus;
    }

    /**
     * @inheritDoc
     */
    public function idLengthOfStayYear()
    {
        return $this->idLengthOfStayYear;
    }

    /**
     * @inheritDoc
     */
    public function idLengthOfStayMonth()
    {
        return $this->idLengthOfStayMonth;
    }

    /**
     * @inheritDoc
     */
    public function domicileAddressType()
    {
        return $this->domicileAddressType;
    }

    /**
     * @inheritDoc
     */
    public function domicileAddressLine1()
    {
        return $this->domicileAddressLine1;
    }

    /**
     * @inheritDoc
     */
    public function domicileAddressLine2()
    {
        return $this->domicileAddressLine2;
    }

    /**
     * @inheritDoc
     */
    public function domicileAddressLine3()
    {
        return $this->domicileAddressLine3;
    }

    /**
     * @inheritDoc
     */
    public function domicileRt()
    {
        return $this->domicileRt;
    }

    /**
     * @inheritDoc
     */
    public function domicileRw()
    {
        return $this->domicileRw;
    }

    /**
     * @inheritDoc
     */
    public function domicileVillage()
    {
        return $this->domicileVillage;
    }

    /**
     * @inheritDoc
     */
    public function domicileSubDistrict()
    {
        return $this->domicileSubDistrict;
    }

    /**
     * @inheritDoc
     */
    public function domicileCityRegencyCode()
    {
        return $this->domicileCityRegencyCode;
    }

    /**
     * @inheritDoc
     */
    public function domicileProvince()
    {
        return $this->domicileProvince;
    }

    /**
     * @inheritDoc
     */
    public function domicileZipCode()
    {
        return $this->domicileZipCode;
    }

    /**
     * @inheritDoc
     */
    public function domicileCountry()
    {
        return $this->domicileCountry;
    }

    /**
     * @inheritDoc
     */
    public function domicileOwnershipStatus()
    {
        return $this->domicileOwnershipStatus;
    }

    /**
     * @inheritDoc
     */
    public function domicileLengthOfStayYear()
    {
        return $this->domicileLengthOfStayYear;
    }

    /**
     * @inheritDoc
     */
    public function domicileLengthOfStayMonth()
    {
        return $this->domicileLengthOfStayMonth;
    }

    /**
     * @inheritDoc
     */
    public function workAddressType()
    {
        return $this->workAddressType;
    }

    /**
     * @inheritDoc
     */
    public function workAddressLine1()
    {
        return $this->workAddressLine1;
    }

    /**
     * @inheritDoc
     */
    public function workAddressLine2()
    {
        return $this->workAddressLine2;
    }

    /**
     * @inheritDoc
     */
    public function workAddressLine3()
    {
        return $this->workAddressLine3;
    }

    /**
     * @inheritDoc
     */
    public function workRt()
    {
        return $this->workRt;
    }

    /**
     * @inheritDoc
     */
    public function workRw()
    {
        return $this->workRw;
    }

    /**
     * @inheritDoc
     */
    public function workVillage()
    {
        return $this->workVillage;
    }

    /**
     * @inheritDoc
     */
    public function workSubDistrict()
    {
        return $this->workSubDistrict;
    }

    /**
     * @inheritDoc
     */
    public function workCityRegencyCode()
    {
        return $this->workCityRegencyCode;
    }

    /**
     * @inheritDoc
     */
    public function workProvince()
    {
        return $this->workProvince;
    }

    /**
     * @inheritDoc
     */
    public function workZipCode()
    {
        return $this->workZipCode;
    }

    /**
     * @inheritDoc
     */
    public function workCountry()
    {
        return $this->workCountry;
    }

    /**
     * @inheritDoc
     */
    public function workOwnershipStatus()
    {
        return $this->workOwnershipStatus;
    }

    /**
     * @inheritDoc
     */
    public function workLengthOfStayYear()
    {
        return $this->workLengthOfStayYear;
    }

    /**
     * @inheritDoc
     */
    public function workLengthOfStayMonth()
    {
        return $this->workLengthOfStayMonth;
    }

    /**
     * @inheritDoc
     */
    public function homePhoneType()
    {
        return $this->homePhoneType;
    }

    /**
     * @inheritDoc
     */
    public function homePhoneAreaCode()
    {
        return $this->homePhoneAreaCode;
    }

    /**
     * @inheritDoc
     */
    public function homePhoneNumber()
    {
        return $this->homePhoneNumber;
    }

    /**
     * @inheritDoc
     */
    public function homePhoneExtension()
    {
        return $this->homePhoneExtension;
    }

    /**
     * @inheritDoc
     */
    public function handPhoneType()
    {
        return $this->handPhoneType;
    }

    /**
     * @inheritDoc
     */
    public function handPhoneAreaCode()
    {
        return $this->handPhoneAreaCode;
    }

    /**
     * @inheritDoc
     */
    public function handPhoneNumber()
    {
        return $this->handPhoneNumber;
    }

    /**
     * @inheritDoc
     */
    public function handPhoneExtension()
    {
        return $this->handPhoneExtension;
    }

    /**
     * @inheritDoc
     */
    public function officePhoneType()
    {
        return $this->officePhoneType;
    }

    /**
     * @inheritDoc
     */
    public function officePhoneAreaCode()
    {
        return $this->officePhoneAreaCode;
    }

    /**
     * @inheritDoc
     */
    public function officePhoneNumber()
    {
        return $this->officePhoneNumber;
    }

    /**
     * @inheritDoc
     */
    public function officePhoneExtension()
    {
        return $this->officePhoneExtension;
    }

    /**
     * @inheritDoc
     */
    public function sequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @inheritDoc
     */
    public function staProductCode()
    {
        return $this->staProductCode;
    }

    /**
     * @inheritDoc
     */
    public function productFamily()
    {
        return $this->productFamily;
    }

    /**
     * @inheritDoc
     */
    public function productType()
    {
        return $this->productType;
    }

    /**
     * @inheritDoc
     */
    public function branchId()
    {
        return $this->branchId;
    }

    /**
     * @inheritDoc
     */
    public function source()
    {
        return $this->source;
    }

    /**
     * @inheritDoc
     */
    public function purpose()
    {
        return $this->purpose;
    }

    /**
     * @inheritDoc
     */
    public function purposeOther()
    {
        return $this->purposeOther;
    }

    /**
     * @inheritDoc
     */
    public function opening()
    {
        return $this->opening;
    }

    /**
     * @inheritDoc
     */
    public function openingOther()
    {
        return $this->openingOther;
    }

    /**
     * @inheritDoc
     */
    public function addressStatement()
    {
        return $this->addressStatement;
    }

    /**
     * @inheritDoc
     */
    public function SID()
    {
        return $this->SID;
    }

    /**
     * @inheritDoc
     */
    public function subAccountEfek()
    {
        return $this->subAccountEfek;
    }

    /**
     * @inheritDoc
     */
    public function corpEfekPenerimaKuasa()
    {
        return $this->corpEfekPenerimaKuasa;
    }

    /**
     * @inheritDoc
     */
    public function currencyType()
    {
        return $this->currencyType;
    }

    /**
     * @inheritDoc
     */
    public function groupIdHeadToHead()
    {
        return $this->groupIdHeadToHead;
    }

    /**
     * @inheritDoc
     */
    public function groupIdPEB()
    {
        return $this->groupIdPEB;
    }

    /**
     * @inheritDoc
     */
    public function employmentType()
    {
        return $this->employmentType;
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return $this->position;
    }

    /**
     * @inheritDoc
     */
    public function department()
    {
        return $this->department;
    }

    /**
     * @inheritDoc
     */
    public function employmentStatus()
    {
        return $this->employmentStatus;
    }

    /**
     * @inheritDoc
     */
    public function economySector()
    {
        return $this->economySector;
    }

    /**
     * @inheritDoc
     */
    public function economySectorOthers()
    {
        return $this->economySectorOthers;
    }

    /**
     * @inheritDoc
     */
    public function lengthOfServiceYear()
    {
        return $this->lengthOfServiceYear;
    }

    /**
     * @inheritDoc
     */
    public function lengthOfServiceMonth()
    {
        return $this->lengthOfServiceMonth;
    }

    /**
     * @inheritDoc
     */
    public function monthlyIncomeCode()
    {
        return $this->monthlyIncomeCode;
    }

    /**
     * @inheritDoc
     */
    public function monthlyIncome()
    {
        return $this->monthlyIncome;
    }

    /**
     * @inheritDoc
     */
    public function companyName()
    {
        return $this->companyName;
    }

    /**
     * @inheritDoc
     */
    public function sourceOfFund()
    {
        return $this->sourceOfFund;
    }

    /**
     * @inheritDoc
     */
    public function sourceOfFundOther()
    {
        return $this->sourceOfFundOther;
    }

    /**
     * @inheritDoc
     */
    public function idType()
    {
        return $this->idType;
    }

    /**
     * @inheritDoc
     */
    public function idExpiryDate()
    {
        return $this->idExpiryDate;
    }

    /**
     * @inheritDoc
     */
    public function idName()
    {
        return $this->idName;
    }

    /**
     * @inheritDoc
     */
    public function idNumber()
    {
        return $this->idNumber;
    }

    /**
     * @inheritDoc
     */
    public function kycType()
    {
        return $this->kycType;
    }

    /**
     * @inheritDoc
     */
    public function kycStatus()
    {
        return $this->kycStatus;
    }

    /**
     * @inheritDoc
     */
    public function additionalData()
    {
        return $this->additionalData;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'appldata_v2/add';
    }

    /**
     * @inheritDoc
     */
    public function encoder()
    {
        return new JsonEncoder;
    }

    /**
     * @inheritDoc
     */
    public function data()
    {
        return [
            'SubmitApplicationRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId,
                ],
                'ApplicationInfo' => [
                    'ReffCode'     => $this->referralCode,
                    'PersonalInfo' => [
                        'StaIndividu' => [
                            'CustomerName'        => $this->customerName,
                            'CityOfBirth'         => $this->cityOfBirth,
                            'DateOfBirth'         => $this->dateOfBirth,
                            'CountryOfBirth'      => $this->countryOfBirth,
                            'Gender'              => $this->gender,
                            'MaritalStatus'       => $this->maritalStatus,
                            'LastEducationStatus' => $this->lastEducationStatus,
                            'NoOfDependant'       => $this->noOfDependant,
                            'Nationality'         => $this->nationality,
                            'EmailAddress'        => $this->emailAddress,
                            'MotherMaidenName'    => $this->motherMaidenName,
                            'ResidentStatus'      => $this->residentStatus,
                            'FlagASCASA'          => $this->flagASCASA,
                            'DepositTrxCount'     => $this->depositTransactionCount,
                            'DepositTrxAmount'    => $this->depositTransactionAmount,
                            'WithdrawalTrxCount'  => $this->withdrawalTransactionCount,
                            'WithdrawalTrxAmount' => $this->withdrawalTransactionAmount,
                            'PromoCode'           => $this->promoCode,
                        ],
                        'AddressInfo' => [
                            [
                                'AddressType'       => $this->idAddressType,
                                'AddressLine1'      => $this->idAddressLine1,
                                'AddressLine2'      => $this->idAddressLine2,
                                'AddressLine3'      => $this->idAddressLine3,
                                'Rt'                => $this->idRt,
                                'Rw'                => $this->idRw,
                                'Village'           => $this->idVillage,
                                'Subdistrict'       => $this->idSubDistrict,
                                'CityRegencyCode'   => $this->idCityRegencyCode,
                                'Province'          => $this->idProvince,
                                'Zipcode'           => $this->idZipCode,
                                'Country'           => $this->idCountry,
                                'OwnershipStatus'   => $this->idOwnershipStatus,
                                'LengthOfStayYear'  => $this->idLengthOfStayYear,
                                'LengthOfStayMonth' => $this->idLengthOfStayMonth,
                            ],
                            [
                                'AddressType'       => $this->domicileAddressType,
                                'AddressLine1'      => $this->domicileAddressLine1,
                                'AddressLine2'      => $this->domicileAddressLine2,
                                'AddressLine3'      => $this->domicileAddressLine3,
                                'Rt'                => $this->domicileRt,
                                'Rw'                => $this->domicileRw,
                                'Village'           => $this->domicileVillage,
                                'Subdistrict'       => $this->domicileSubDistrict,
                                'CityRegencyCode'   => $this->domicileCityRegencyCode,
                                'Province'          => $this->domicileProvince,
                                'Zipcode'           => $this->domicileZipCode,
                                'Country'           => $this->domicileCountry,
                                'OwnershipStatus'   => $this->domicileOwnershipStatus,
                                'LengthOfStayYear'  => $this->domicileLengthOfStayYear,
                                'LengthOfStayMonth' => $this->domicileLengthOfStayMonth,
                            ],
                            [
                                'AddressType'       => $this->workAddressType,
                                'AddressLine1'      => $this->workAddressLine1,
                                'AddressLine2'      => $this->workAddressLine2,
                                'AddressLine3'      => $this->workAddressLine3,
                                'Rt'                => $this->workRt,
                                'Rw'                => $this->workRw,
                                'Village'           => $this->workVillage,
                                'Subdistrict'       => $this->workSubDistrict,
                                'CityRegencyCode'   => $this->workCityRegencyCode,
                                'Province'          => $this->workProvince,
                                'Zipcode'           => $this->workZipCode,
                                'Country'           => $this->workCountry,
                                'OwnershipStatus'   => $this->workOwnershipStatus,
                                'LengthOfStayYear'  => $this->workLengthOfStayYear,
                                'LengthOfStayMonth' => $this->workLengthOfStayMonth,
                            ],
                        ],
                        'PhoneInfo'   => [
                            [
                                'PhoneType'     => $this->homePhoneType,
                                'PhoneAreaCode' => $this->homePhoneAreaCode,
                                'PhoneNumber1'  => $this->homePhoneNumber,
                                'PhoneExt'      => $this->homePhoneExtension,
                            ],
                            [
                                'PhoneType'     => $this->handPhoneType,
                                'PhoneAreaCode' => $this->handPhoneAreaCode,
                                'PhoneNumber1'  => $this->handPhoneNumber,
                                'PhoneExt'      => $this->handPhoneExtension,
                            ],
                            [
                                'PhoneType'     => $this->officePhoneType,
                                'PhoneAreaCode' => $this->officePhoneAreaCode,
                                'PhoneNumber1'  => $this->officePhoneNumber,
                                'PhoneExt'      => $this->officePhoneExtension,
                            ],
                        ],
                        'Products'    => [
                            [
                                'CasaProducts' => [
                                    [
                                        'SeqNo'              => $this->sequenceNumber,
                                        'StaProductCode'     => $this->staProductCode,
                                        'ProductFamily'      => $this->productFamily,
                                        'ProductType'        => $this->productType,
                                        'BranchId'           => $this->branchId,
                                        'Source'             => $this->source,
                                        'Purpose'            => $this->purpose,
                                        'PurposeOther'       => $this->purposeOther,
                                        'Opening'            => $this->opening,
                                        'OpeningOther'       => $this->openingOther,
                                        'AddressStatement'   => $this->addressStatement,
                                        'AdditionalCasaInfo' => [
                                            'SID'                   => $this->SID,
                                            'SubAcctEfek'           => $this->subAccountEfek,
                                            'CorpEfekPenerimaKuasa' => $this->corpEfekPenerimaKuasa,
                                            'CurrencyType'          => $this->currencyType,
                                            'GroupIdH2H'            => $this->groupIdHeadToHead,
                                            'GroupIdPEB'            => $this->groupIdPEB,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'Employments' => [
                            'EmploymentInfo' => [
                                'EmploymentType'       => $this->employmentType,
                                'Position'             => $this->position,
                                'Department'           => $this->department,
                                'EmploymentStatus'     => $this->employmentStatus,
                                'EconomySector'        => $this->economySector,
                                'EconomySectorOthers'  => $this->economySectorOthers,
                                'LengthOfServiceYear'  => $this->lengthOfServiceYear,
                                'LengthOfServiceMonth' => $this->lengthOfServiceMonth,
                                'MonthlyIncomeCode'    => $this->monthlyIncomeCode,
                                'MonthlyIncome'        => $this->monthlyIncome,
                                'CompanyName'          => $this->companyName,
                                'SourceOfFund'         => $this->sourceOfFund,
                                'SourceOfFundOther'    => $this->sourceOfFundOther,
                            ],
                        ],
                        'Identities'  => [
                            'IdentitiesInfo' => [
                                [
                                    'IDType'       => $this->idType,
                                    'IDExpiryDate' => $this->idExpiryDate,
                                    'IDName'       => $this->idName,
                                    'IDNumber'     => $this->idNumber,
                                ],
                            ],
                        ],
                        'KYCOption'   => [
                            'KycType'        => $this->kycType,
                            'KYCStatus'      => $this->kycStatus,
                            'AdditionalData' => $this->additionalData,
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function header()
    {
        return new CommonHeader($this);
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * @inheritDoc
     */
    public function messages()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function customAttributes()
    {
        return [

        ];
    }
}
