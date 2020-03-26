<?php

namespace Assetku\BankService\SubmitApplicationData\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\Subjects\SubmitApplicationDataSubject;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoderUnescapedSlashes;
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
    protected $idLengthOfStayYear = '25';

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
    protected $domicileLengthOfStayYear = '25';

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
    protected $workLengthOfStayYear = '25';

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
    protected $opening = '3';

    /**
     * @var string
     */
    protected $addressStatement = '02';

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
    protected $companyName;

    /**
     * @var string
     */
    protected $economySector;

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
    protected $monthlyIncome;

    /**
     * @var string
     */
    protected $monthlyIncomeCode;

    /**
     * @var string
     */
    protected $sourceOfFund;

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
    protected $idNumber;

    /**
     * @var string
     */
    protected $idName;

    /**
     * @var string
     */
    protected $kycType = '7';

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
    public function idLengthOfStayYear()
    {
        return $this->idLengthOfStayYear;
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
    public function domicileLengthOfStayYear()
    {
        return $this->domicileLengthOfStayYear;
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
    public function workLengthOfStayYear()
    {
        return $this->workLengthOfStayYear;
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
    public function opening()
    {
        return $this->opening;
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
    public function companyName()
    {
        return $this->companyName;
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
    public function monthlyIncome()
    {
        return $this->monthlyIncome;
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
    public function sourceOfFund()
    {
        return $this->sourceOfFund;
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
    public function idNumber()
    {
        return $this->idNumber;
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
    public function kycType()
    {
        return $this->kycType;
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
        return new JsonEncoderUnescapedSlashes;
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
                        ],
                        'AddressInfo' => [
                            [
                                'AddressType'      => $this->idAddressType,
                                'AddressLine1'     => $this->idAddressLine1,
                                'AddressLine2'     => $this->idAddressLine2,
                                'Rt'               => $this->idRt,
                                'Rw'               => $this->idRw,
                                'Village'          => $this->idVillage,
                                'Subdistrict'      => $this->idSubDistrict,
                                'CityRegencyCode'  => $this->idCityRegencyCode,
                                'Province'         => $this->idProvince,
                                'Zipcode'          => $this->idZipCode,
                                'Country'          => $this->idCountry,
                                'LengthOfStayYear' => $this->idLengthOfStayYear,
                            ],
                            [
                                'AddressType'      => $this->domicileAddressType,
                                'AddressLine1'     => $this->domicileAddressLine1,
                                'AddressLine2'     => $this->domicileAddressLine2,
                                'Rt'               => $this->domicileRt,
                                'Rw'               => $this->domicileRw,
                                'Village'          => $this->domicileVillage,
                                'Subdistrict'      => $this->domicileSubDistrict,
                                'CityRegencyCode'  => $this->domicileCityRegencyCode,
                                'Province'         => $this->domicileProvince,
                                'Zipcode'          => $this->domicileZipCode,
                                'Country'          => $this->domicileCountry,
                                'LengthOfStayYear' => $this->domicileLengthOfStayYear,
                            ],
                            [
                                'AddressType'      => $this->workAddressType,
                                'AddressLine1'     => $this->workAddressLine1,
                                'AddressLine2'     => $this->workAddressLine2,
                                'Rt'               => $this->workRt,
                                'Rw'               => $this->workRw,
                                'Village'          => $this->workVillage,
                                'Subdistrict'      => $this->workSubDistrict,
                                'CityRegencyCode'  => $this->workCityRegencyCode,
                                'Province'         => $this->workProvince,
                                'Zipcode'          => $this->workZipCode,
                                'Country'          => $this->workCountry,
                                'LengthOfStayYear' => $this->workLengthOfStayYear,
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
                                        'Opening'            => $this->opening,
                                        'AddressStatement'   => $this->addressStatement,
                                        'AdditionalCasaInfo' => [
                                            'GroupIdH2H' => $this->groupIdHeadToHead,
                                            'GroupIdPEB' => $this->groupIdPEB,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'Employments' => [
                            'EmploymentInfo' => [
                                'EmploymentType'       => $this->employmentType,
                                'Position'             => $this->position,
                                'CompanyName'          => $this->companyName,
                                'EconomySector'        => $this->economySector,
                                'LengthOfServiceYear'  => $this->lengthOfServiceYear,
                                'LengthOfServiceMonth' => $this->lengthOfServiceMonth,
                                'MonthlyIncome'        => $this->monthlyIncome,
                                'MonthlyIncomeCode'    => $this->monthlyIncomeCode,
                                'SourceOfFund'         => $this->sourceOfFund,
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
                            'KycType' => $this->kycType,
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
            'SubmitApplicationRq'                                                                                      => 'required|array|size:2',
            'SubmitApplicationRq.MsgRqHdr'                                                                             => 'required|array|size:2',
            'SubmitApplicationRq.MsgRqHdr.RequestTimestamp'                                                            => 'required|string|date',
            'SubmitApplicationRq.MsgRqHdr.CustRefID'                                                                   => 'required|string|size:20',
            'SubmitApplicationRq.ApplicationInfo'                                                                      => 'required|array|size:2',
            'SubmitApplicationRq.ApplicationInfo.ReffCode'                                                             => 'present|string',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo'                                                         => 'required|array|size:7',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu'                                             => 'required|array|size:17',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.CustomerName'                                => [
                'required', 'string', 'between:3,40', 'regex:/^[A-Z ]+$/',
            ],
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.CityOfBirth'                                 => 'required|string|min:3,50',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.DateOfBirth'                                 => 'required|string|date',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.CountryOfBirth'                              => 'required|string|in:ID',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.Gender'                                      => 'required|string|in:10,20',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.MaritalStatus'                               => 'required|string|in:M,S,W',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.LastEducationStatus'                         => 'required|string|in:0100,0101,0102,0103,0104,0105,0106',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.NoOfDependant'                               => 'required|string|in:01',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.Nationality'                                 => 'required|string|in:ID',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.EmailAddress'                                => 'required|string|email|between:6,40',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.MotherMaidenName'                            => 'required|string|between:3,40',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.ResidentStatus'                              => 'required|string|in:R,NR',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.FlagASCASA'                                  => 'required|string|in:Y,N',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.DepositTrxCount'                             => 'required|string|in:010,020,030',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.DepositTrxAmount'                            => 'required|string|in:010,020,030',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.WithdrawalTrxCount'                          => 'required|string|in:010,020,030',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.WithdrawalTrxAmount'                         => 'required|string|in:010,020,030',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo'                                             => 'required|array|size:3',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.AddressType'                               => 'required|string|in:01,02,03,04,05,06,07,08',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.AddressLine1'                              => 'required|string|between:3,40',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.AddressLine2'                              => 'required|string|between:3,40',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Rt'                                        => 'required|string|between:2,3',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Rw'                                        => 'required|string|between:2,3',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Village'                                   => 'required|string|between:3,50',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Subdistrict'                               => 'required|string|between:3,50',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.CityRegencyCode'                           => 'required|string|between:3,4',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Province'                                  => 'required|string|between:3,50',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Zipcode'                                   => 'required|string|size:5',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Country'                                   => 'required|string|size:2',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.LengthOfStayYear'                          => 'required|string|max:4',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo'                                               => 'required|array|size:3',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo.*.PhoneType'                                   => 'required|string|in:HOMEPHONE1,HOMEPHONE2,HP1,HP2,HP3,OFFICEPHONE1',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo.*.PhoneAreaCode'                               => 'required|string|between:4,5',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo.*.PhoneNumber1'                                => 'required|string|between:6,10',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo.*.PhoneExt'                                    => 'required|string|between:4,5',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products'                                                => 'required|array|size:1',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts'                                 => 'required|array|size:1',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.SeqNo'                         => 'required|string|in:1,2,3,4,5,6,7,8,9',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.StaProductCode'                => 'required|string|in:TR016,TR012',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.ProductFamily'                 => 'required|string|in:SavingO',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.ProductType'                   => 'required|string|in:UI,GV,UJ',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.BranchId'                      => 'required|string|in:0204',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.Source'                        => 'required|string|in:U',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.Purpose'                       => 'required|string|in:1,2,3,4,5',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.Opening'                       => 'required|string|in:1,2,3,4,5,6',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.AddressStatement'              => 'required|string|in:02,06',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.AdditionalCasaInfo'            => 'required|array|size:2',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.AdditionalCasaInfo.GroupIdH2H' => 'required|string',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.AdditionalCasaInfo.GroupIdPEB' => 'required|string',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments'                                             => 'required|array|size:1',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo'                              => 'required|array|size:9',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.EmploymentType'               => 'required|string|in:A,B,C,D,E,F,G,H,I',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.Position'                     => 'required|string|min:3',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.CompanyName'                  => 'required|string|between:3,50',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.EconomySector'                => 'required|string|size:3',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.LengthOfServiceYear'          => 'required|string|size:2',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.LengthOfServiceMonth'         => 'required|string|size:2',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.MonthlyIncome'                => 'required|string|between:5,10',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.MonthlyIncomeCode'            => 'required|string|in:1,2,3,4',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.SourceOfFund'                 => 'required|string|in:1,2,3,4,5,6,7,8',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities'                                              => 'required|array|size:1',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo'                               => 'required|array|size:1',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDType'                      => 'required|string|in:KT',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDExpiryDate'                => 'required|string|date',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDNumber'                    => 'required|string|size:16',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDName'                      => [
                'required', 'string', 'between:3,40', 'regex:/^[A-Z ]+$/',
            ],
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.KYCOption'                                               => 'required|array|size:1',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.KYCOption.KycType'                                       => 'required|string|in:1,2,3,4,5,6,7',
        ];
    }

    /**
     * @inheritDoc
     */
    public function messages()
    {
        return [
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.CustomerName.regex'           => ':attribute harus terdiri atas huruf kapital.',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDName.regex' => ':attribute harus terdiri atas huruf kapital.'
        ];
    }

    /**
     * @inheritDoc
     */
    public function customAttributes()
    {
        return [
            'SubmitApplicationRq'                                                                                      => 'submit application request',
            'SubmitApplicationRq.MsgRqHdr'                                                                             => 'header permintaan pesan',
            'SubmitApplicationRq.MsgRqHdr.RequestTimestamp'                                                            => 'timestamp',
            'SubmitApplicationRq.MsgRqHdr.CustRefID'                                                                   => 'id referral pelanggan',
            'SubmitApplicationRq.ApplicationInfo'                                                                      => 'info aplikasi',
            'SubmitApplicationRq.ApplicationInfo.ReffCode'                                                             => 'kode referral',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo'                                                         => 'info pribadi',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu'                                             => 'sta individu',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.CustomerName'                                => 'nama pelanggan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.CityOfBirth'                                 => 'kota lahir',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.DateOfBirth'                                 => 'tanggal lahir',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.CountryOfBirth'                              => 'negara lahir',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.Gender'                                      => 'jenis kelamin',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.MaritalStatus'                               => 'status kawin',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.LastEducationStatus'                         => 'status pendidikan terakhir',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.NoOfDependant'                               => 'jumlah tanggungan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.Nationality'                                 => 'kewarganegaraan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.EmailAddress'                                => 'alamat email',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.MotherMaidenName'                            => 'nama gadis ibu',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.ResidentStatus'                              => 'status kependudukan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.FlagASCASA'                                  => 'flag AS CASA',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.DepositTrxCount'                             => 'hitungan transaksi deposit',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.DepositTrxAmount'                            => 'jumlah transaksi deposit',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.WithdrawalTrxCount'                          => 'hitungan transaksi penarikan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.StaIndividu.WithdrawalTrxAmount'                         => 'hitungan transaksi penarikan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo'                                             => 'info alamat',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.AddressType'                               => 'jenis alamat',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.AddressLine1'                              => 'alamat baris 1',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.AddressLine2'                              => 'alamat baris 2',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Rt'                                        => 'rt',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Rw'                                        => 'rw',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Village'                                   => 'kelurahan/desa',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Subdistrict'                               => 'kecamatan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.CityRegencyCode'                           => 'kode kabupaten/kota',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Province'                                  => 'provinsi',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Zipcode'                                   => 'kode pos',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.Country'                                   => 'negara',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.AddressInfo.*.LengthOfStayYear'                          => 'lamanya tahun tinggal',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo'                                               => 'info telepon',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo.*.PhoneType'                                   => 'jenis telepon',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo.*.PhoneAreaCode'                               => 'kode area telepon',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo.*.PhoneNumber1'                                => 'nomor telepon',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.PhoneInfo.*.PhoneExt'                                    => 'ekstensi telepon',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products'                                                => 'produk',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts'                                 => 'produk CASA',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.SeqNo'                         => 'nomor urut',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.StaProductCode'                => 'kode produk sta',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.ProductFamily'                 => 'keluarga produk',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.ProductType'                   => 'jenis produk',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.BranchId'                      => 'id cabang',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.Source'                        => 'sumber',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.Purpose'                       => 'tujuan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.Opening'                       => 'pembukaan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.AddressStatement'              => 'pernyataan alamat',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.AdditionalCasaInfo'            => 'info CASA tambahan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.AdditionalCasaInfo.GroupIdH2H' => 'id kelompok head to head',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Products.*.CasaProducts.*.AdditionalCasaInfo.GroupIdPEB' => 'id grup permata e-business',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments'                                             => 'pekerjaan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo'                              => 'info pekerjaan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.EmploymentType'               => 'jenis pekerjaan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.Position'                     => 'jabatan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.CompanyName'                  => 'nama perusahaan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.EconomySector'                => 'sektor ekonomi',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.LengthOfServiceYear'          => 'lamanya tahun layanan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.LengthOfServiceMonth'         => 'lamanya bulan layanan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.MonthlyIncome'                => 'pendapatan bulanan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.MonthlyIncomeCode'            => 'kode pendapatan bulanan',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Employments.EmploymentInfo.SourceOfFund'                 => 'sumber dana',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities'                                              => 'identitas',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo'                               => 'info identitas',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDType'                      => 'jenis identitas',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDExpiryDate'                => 'tanggal kadaluwarsa identitas',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDNumber'                    => 'nomor identitas',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.Identities.IdentitiesInfo.*.IDName'                      => 'nama identitas',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.KYCOption'                                               => 'pilihan KYC',
            'SubmitApplicationRq.ApplicationInfo.PersonalInfo.KYCOption.KycType'                                       => 'jenis KYC',
        ];
    }
}
