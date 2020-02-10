<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface SubmitApplicationDataRequestContract extends BaseRequestContract
{
    /**
     * Get submit application data request's referral code
     *
     * @return string
     */
    public function referralCode();

    /**
     * Get submit application data request's customer name
     *
     * @return string
     */
    public function customerName();

    /**
     * Get submit application data request's city of birth
     *
     * @return string
     */
    public function cityOfBirth();

    /**
     * Get submit application data request's date of birth
     *
     * @return string
     */
    public function dateOfBirth();

    /**
     * Get submit application data request's country of birth
     *
     * @return string
     */
    public function countryOfBirth();

    /**
     * Get submit application data request's gender
     *
     * @return string
     */
    public function gender();

    /**
     * Get submit application data request's marital status
     *
     * @return string
     */
    public function maritalStatus();

    /**
     * Get submit application data request's nationality
     *
     * @return string
     */
    public function nationality();

    /**
     * Get submit application data request's email address
     *
     * @return string
     */
    public function emailAddress();

    /**
     * Get submit application data request's mother maiden name
     *
     * @return string
     */
    public function motherMaidenName();

    /**
     * Get submit application data request's last education status
     *
     * @return string
     */
    public function lastEducationStatus();

    /**
     * Get submit application data request's no of dependant
     */
    public function noOfDependant();

    /**
     * Get submit application data request's resident status
     *
     * @return string
     */
    public function residentStatus();

    /**
     * Get submit application data request's flag AS CASA
     *
     * @return string
     */
    public function flagASCASA();

    /**
     * Get submit application data request's deposit transaction count
     *
     * @return string
     */
    public function depositTransactionCount();

    /**
     * Get submit application data request's deposit transaction amount
     *
     * @return string
     */
    public function depositTransactionAmount();

    /**
     * Get submit application data request's withdrawal transaction count
     *
     * @return string
     */
    public function withdrawalTransactionCount();

    /**
     * Get submit application data request's withdrawal transaction amount
     *
     * @return string
     */
    public function withdrawalTransactionAmount();

    /**
     * Get submit application data request's id address line 1
     *
     * @return string
     */
    public function idAddressType();

    /**
     * Get submit application data request's id address line 1
     *
     * @return string
     */
    public function idAddressLine1();

    /**
     * Get submit application data request's id address line 2
     *
     * @return string
     */
    public function idAddressLine2();

    /**
     * Get submit application data request's id rt
     *
     * @return string
     */
    public function idRt();

    /**
     * Get submit application data request's id rw
     *
     * @return string
     */
    public function idRw();

    /**
     * Get submit application data request's id village
     *
     * @return string
     */
    public function idVillage();

    /**
     * Get submit application data request's id sub district
     *
     * @return string
     */
    public function idSubDistrict();

    /**
     * Get submit application data request's id city regency code
     *
     * @return string
     */
    public function idCityRegencyCode();

    /**
     * Get submit application data request's id province
     *
     * @return string
     */
    public function idProvince();

    /**
     * Get submit application data request's id zip code
     *
     * @return string
     */
    public function idZipCode();

    /**
     * Get submit application data request's id country
     *
     * @return string
     */
    public function idCountry();

    /**
     * Get submit application data request's id length of stay year
     *
     * @return string
     */
    public function idLengthOfStayYear();

    /**
     * Get submit application data request's domicile address line 1
     *
     * @return string
     */
    public function domicileAddressType();

    /**
     * Get submit application data request's domicile address line 1
     *
     * @return string
     */
    public function domicileAddressLine1();

    /**
     * Get submit application data request's domicile address line 2
     *
     * @return string
     */
    public function domicileAddressLine2();

    /**
     * Get submit application data request's domicile rt
     *
     * @return string
     */
    public function domicileRt();

    /**
     * Get submit application data request's domicile rw
     *
     * @return string
     */
    public function domicileRw();

    /**
     * Get submit application data request's domicile village
     *
     * @return string
     */
    public function domicileVillage();

    /**
     * Get submit application data request's domicile sub district
     *
     * @return string
     */
    public function domicileSubDistrict();

    /**
     * Get submit application data request's domicile city regency code
     *
     * @return string
     */
    public function domicileCityRegencyCode();

    /**
     * Get submit application data request's domicile province
     *
     * @return string
     */
    public function domicileProvince();

    /**
     * Get submit application data request's domicile zip code
     *
     * @return string
     */
    public function domicileZipCode();

    /**
     * Get submit application data request's domicile country
     *
     * @return string
     */
    public function domicileCountry();

    /**
     * Get submit application data request's domicile length of stay year
     *
     * @return string
     */
    public function domicileLengthOfStayYear();

    /**
     * Get submit application data request's work address line 1
     *
     * @return string
     */
    public function workAddressType();

    /**
     * Get submit application data request's work address line 1
     *
     * @return string
     */
    public function workAddressLine1();

    /**
     * Get submit application data request's work address line 2
     *
     * @return string
     */
    public function workAddressLine2();

    /**
     * Get submit application data request's work rt
     *
     * @return string
     */
    public function workRt();

    /**
     * Get submit application data request's work rw
     *
     * @return string
     */
    public function workRw();

    /**
     * Get submit application data request's work village
     *
     * @return string
     */
    public function workVillage();

    /**
     * Get submit application data request's work sub district
     *
     * @return string
     */
    public function workSubDistrict();

    /**
     * Get submit application data request's work city regency code
     *
     * @return string
     */
    public function workCityRegencyCode();

    /**
     * Get submit application data request's work province
     *
     * @return string
     */
    public function workProvince();

    /**
     * Get submit application data request's work zip code
     *
     * @return string
     */
    public function workZipCode();

    /**
     * Get submit application data request's work country
     *
     * @return string
     */
    public function workCountry();

    /**
     * Get submit application data request's work length of stay year
     *
     * @return string
     */
    public function workLengthOfStayYear();

    /**
     * Get submit application data request's home phone type
     *
     * @return string
     */
    public function homePhoneType();

    /**
     * Get submit application data request's home phone area code
     *
     * @return string
     */
    public function homePhoneAreaCode();

    /**
     * Get submit application data request's home phone number
     *
     * @return string
     */
    public function homePhoneNumber();

    /**
     * Get submit application data request's home extension
     *
     * @return string
     */
    public function homePhoneExtension();

    /**
     * Get submit application data request's hand phone type
     *
     * @return string
     */
    public function handPhoneType();

    /**
     * Get submit application data request's hand phone area code
     *
     * @return string
     */
    public function handPhoneAreaCode();

    /**
     * Get submit application data request's hand phone number
     *
     * @return string
     */
    public function handPhoneNumber();

    /**
     * Get submit application data request's hand extension
     *
     * @return string
     */
    public function handPhoneExtension();

    /**
     * Get submit application data request's office phone type
     *
     * @return string
     */
    public function officePhoneType();

    /**
     * Get submit application data request's office phone area code
     *
     * @return string
     */
    public function officePhoneAreaCode();

    /**
     * Get submit application data request's office phone number
     *
     * @return string
     */
    public function officePhoneNumber();

    /**
     * Get submit application data request's office extension
     *
     * @return string
     */
    public function officePhoneExtension();

    /**
     * Get submit application data request's sequence number
     *
     * @return string
     */
    public function sequenceNumber();

    /**
     * Get submit application data request's sta product code
     *
     * @return string
     */
    public function staProductCode();

    /**
     * Get submit application data request's product family
     *
     * @return string
     */
    public function productFamily();

    /**
     * Get submit application data request's product type
     *
     * @return string
     */
    public function productType();

    /**
     * Get submit application data request's branch id
     *
     * @return string
     */
    public function branchId();

    /**
     * Get submit application data request's source
     *
     * @return string
     */
    public function source();

    /**
     * Get submit application data request's purpose
     *
     * @return string
     */
    public function purpose();

    /**
     * Get submit application data request's opening
     *
     * @return string
     */
    public function opening();

    /**
     * Get submit application data request's addressStatement
     *
     * @return string
     */
    public function addressStatement();

    /**
     * Get submit application data request's currency type
     *
     * @return string
     */
    public function currencyType();

    /**
     * Get submit application data request's group id head to head
     *
     * @return string
     */
    public function groupIdHeadToHead();

    /**
     * Get submit application data request's group id peb
     *
     * @return string
     */
    public function groupIdPEB();

    /**
     * Get submit application data request's employment type
     *
     * @return string
     */
    public function employmentType();

    /**
     * Get submit application data request's position
     *
     * @return string
     */
    public function position();

    /**
     * Get submit application data request's company name
     *
     * @return string
     */
    public function companyName();

    /**
     * Get submit application data request's economy sector
     *
     * @return string
     */
    public function economySector();

    /**
     * Get submit application data request's length of service year
     *
     * @return string
     */
    public function lengthOfServiceYear();

    /**
     * Get submit application data request's length of service month
     *
     * @return string
     */
    public function lengthOfServiceMonth();

    /**
     * Get submit application data request's monthly income code
     *
     * @return string
     */
    public function monthlyIncomeCode();

    /**
     * Get submit application data request's monthly income
     *
     * @return string
     */
    public function monthlyIncome();

    /**
     * Get submit application data request's source of fund
     *
     * @return string
     */
    public function sourceOfFund();

    /**
     * Get submit application data request's id type
     *
     * @return string
     */
    public function idType();

    /**
     * Get submit application data request's id expiry date
     *
     * @return string
     */
    public function idExpiryDate();

    /**
     * Get submit application data request's id number
     *
     * @return string
     */
    public function idNumber();

    /**
     * Get submit application data request's id name
     *
     * @return string
     */
    public function idName();

    /**
     * Get submit application data request's kyc type
     *
     * @return string
     */
    public function kycType();
}
