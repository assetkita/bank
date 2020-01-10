<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\AddressInfo;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\Employment;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\PersonalInfo;

use Assetku\BankService\Investa\Permatabank\ApplicationInfo;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\StaIndividu;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\Product;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\CasaProduct;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\CasaInfo;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\Identity;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\IdentityInfo;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\AdditionalCasaInfo;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\KycOption;

use Assetku\BankService\Investa\Permatabank\PersonalInfo\PhoneInfo;

class InvestaRegisterTest extends TestCase
{
    public function testSuccessRegisterInvestaAccount()
    {
        $custRefId = (string) mt_rand(1111111111, 9999999999);

        $application = new ApplicationInfo;
        
        $application->setPersonalInfo($this->getPersonalInfo());
        
        $application->setReffCode('');

        try {
            $submitFintech = \Bank::submitFintechAccount($application->toArray(), $custRefId);

            $this->assertTrue(
                $submitFintech->getCustomerReferenceId() === $custRefId &&
                $submitFintech->getStatusCode() === '00' &&
                $submitFintech->getStatusDescription() === 'Success'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }

    }

    protected function getPersonalInfo()
    {
        $personalInfo = new PersonalInfo;

        $personalInfo->setAddressInfos($this->getAddress1())
                    ->setAddressInfos($this->getAddress2())
                    ->setAddressInfos($this->getAddress3())
                    ->setAddressInfos($this->getAddress4())
                    ->setPhoneInfos($this->getPhoneInfo1())
                    ->setPhoneInfos($this->getPhoneInfo2())
                    ->setPhoneInfos($this->getPhoneInfo3())
                    ->setStaIndividu($this->getStaIndividu())
                    ->setProducts($this->getProducts())
                    ->setEmployments($this->getEmployment())
                    ->setIdentities($this->getIdentities())
                    ->setKycOption($this->getKycInfo());

        return $personalInfo;
    }

    protected function getStaIndividu()
    {
        $staIndividu = new StaIndividu;

        $staIndividu->setCustomerName('Agung Trilaksono');
        $staIndividu->setCityOfBirth($this->faker->city);
        $staIndividu->setDateofBirth($this->faker->date);
        $staIndividu->setCountryOfBirth('ID');
        $staIndividu->setGender('10');
        $staIndividu->setMaritalStatus('W');
        $staIndividu->setLastEducationStatus('0104');
        $staIndividu->setNoOfDependant('01');
        $staIndividu->setNationality('ID');
        $staIndividu->setEmailAddress($this->faker->safeEmail);
        $staIndividu->setMotherMaidenName('Sutatik');
        $staIndividu->setResidentStatus('R');
        $staIndividu->setFlagASCASA('Y');
        $staIndividu->setDepositTrxCount('010');
        $staIndividu->setDepositTrxAmount('010');
        $staIndividu->setWithdrawalTrxCount('010');
        $staIndividu->setWithdrawalTrxAmount('010');
        $staIndividu->setPromoCode('');

        return $staIndividu;
    }

    protected function getAddress1()
    {
        $addressInfo = new AddressInfo;

        $addressInfo->setAddressType('05');
        $addressInfo->setAddressLine1('JL raya kelurahan lontar 10');
        $addressInfo->setAddressLine2('JL raya kelurahan lontar 10');
        $addressInfo->setAddressLine3('JL raya kelurahan lontar 10');
        $addressInfo->setRt('04');
        $addressInfo->setRw('01');
        $addressInfo->setVillage($this->faker->city);
        $addressInfo->setSubdistrict($this->faker->city);
        $addressInfo->setCityRegencyCode('0198');
        $addressInfo->setProvince($this->faker->state);
        $addressInfo->setZipCode('60274');
        $addressInfo->setCountry('ID');
        $addressInfo->setOwnershipStatus('1');
        $addressInfo->setLengthOfStayYear('5');

        return $addressInfo;
    }

    protected function getAddress2()
    {
        $addressInfo = new AddressInfo;

        $addressInfo->setAddressType('01');
        $addressInfo->setAddressLine1('JL raya kelurahan lontar 10');
        $addressInfo->setAddressLine2('JL raya kelurahan lontar 10');
        $addressInfo->setAddressLine3('JL raya kelurahan lontar 10');
        $addressInfo->setRt('04');
        $addressInfo->setRw('01');
        $addressInfo->setVillage($this->faker->city);
        $addressInfo->setSubdistrict($this->faker->city);
        $addressInfo->setCityRegencyCode('0198');
        $addressInfo->setProvince($this->faker->state);
        $addressInfo->setZipCode('60274');
        $addressInfo->setCountry('ID');
        $addressInfo->setOwnershipStatus('1');
        $addressInfo->setLengthOfStayYear('5');

        return $addressInfo;
    }

    protected function getAddress3()
    {
        $addressInfo = new AddressInfo;

        $addressInfo->setAddressType('02');
        $addressInfo->setAddressLine1('JL raya kelurahan lontar 10');
        $addressInfo->setAddressLine2('JL raya kelurahan lontar 10');
        $addressInfo->setAddressLine3('JL raya kelurahan lontar 10');
        $addressInfo->setRt('04');
        $addressInfo->setRw('01');
        $addressInfo->setVillage($this->faker->city);
        $addressInfo->setSubdistrict($this->faker->city);
        $addressInfo->setCityRegencyCode('0198');
        $addressInfo->setProvince($this->faker->state);
        $addressInfo->setZipCode('60274');
        $addressInfo->setCountry('ID');
        $addressInfo->setOwnershipStatus('1');
        $addressInfo->setLengthOfStayYear('5');

        return $addressInfo;
    }

    protected function getAddress4()
    {
        $addressInfo = new AddressInfo;

        $addressInfo->setAddressType('06');
        $addressInfo->setAddressLine1('JL raya kelurahan lontar 10');
        $addressInfo->setAddressLine2('JL raya kelurahan lontar 10');
        $addressInfo->setAddressLine3('JL raya kelurahan lontar 10');
        $addressInfo->setRt('04');
        $addressInfo->setRw('01');
        $addressInfo->setVillage($this->faker->city);
        $addressInfo->setSubdistrict($this->faker->city);
        $addressInfo->setCityRegencyCode('0198');
        $addressInfo->setProvince($this->faker->state);
        $addressInfo->setZipCode('60274');
        $addressInfo->setCountry('ID');
        $addressInfo->setOwnershipStatus('1');
        $addressInfo->setLengthOfStayYear('5');

        return $addressInfo;
    }

    protected function getPhoneInfo1()
    {
        $phoneInfo = new PhoneInfo;

        $phoneInfo->setPhoneType('HOMEPHONE1');
        $phoneInfo->setPhoneAreaCode('0878');
        $phoneInfo->setPhoneNumber1('51968989');
        $phoneInfo->setPhoneExt('0000');

        return $phoneInfo;
    }

    protected function getPhoneInfo2()
    {
        $phoneInfo = new PhoneInfo;

        $phoneInfo->setPhoneType('HP1');
        $phoneInfo->setPhoneAreaCode('0878');
        $phoneInfo->setPhoneNumber1('51968989');
        $phoneInfo->setPhoneExt('0000');

        return $phoneInfo;
    }

    protected function getPhoneInfo3()
    {
        $phoneInfo = new PhoneInfo;

        $phoneInfo->setPhoneType('OFFICEPHONE1');
        $phoneInfo->setPhoneAreaCode('0878');
        $phoneInfo->setPhoneNumber1('51968989');
        $phoneInfo->setPhoneExt('0000');

        return $phoneInfo;
    }

    protected function getProducts()
    {
        $product = new Product;

        $product->setCasaProducts($this->getCasaProducts());

        return $product;
    }

    protected function getCasaProducts()
    {
        $casaProduct = new CasaProduct;

        $casaProduct->setCasaInfos($this->getCasaInfo());

        return $casaProduct;
    }

    protected function getCasaInfo()
    {
        $casaInfo = new CasaInfo;

        $casaInfo->setSeqNo('1');
        $casaInfo->setStaProductCode('TR016');
        $casaInfo->setProductFamily('SavingO');
        $casaInfo->setProductType('UI');
        $casaInfo->setBranchId('17147');
        $casaInfo->setSource('U');
        $casaInfo->setPurpose('4');
        $casaInfo->setPurposeOther('');
        $casaInfo->setOpening('3');
        $casaInfo->setOpeningOther('');
        $casaInfo->setAddressStatement('02');

        $casaInfo->setAdditionalCasaInfo($this->getAdditionalCasaInfo());

        return $casaInfo;
    }

    protected function getAdditionalCasaInfo()
    {
        $additional = new AdditionalCasaInfo;

        $additional->setSid('');
        $additional->setSubAcctEfek('');
        $additional->setCorpEfekPenerimaKuasa('');
        $additional->setCurrencyType('');
        $additional->setGroupIdH2H('WD62876099');
        $additional->setGroupIdPEB('D628760001L');

        return $additional;
    }

    protected function getEmployment()
    {
        $employment = new Employment;

        $employment->setEmploymentType('A');
        $employment->setPosition('Admin');
        $employment->setDepartment('Kelurahan');
        $employment->setEmploymentStatus('1');
        $employment->setEconomySector('074');
        $employment->setEconomySectorOthers('');
        $employment->setLengthOfServiceYear('02');
        $employment->setLengthOfServiceMonth('02');
        $employment->setMonthlyIncomeCode('1');
        $employment->setMonthlyIncome('100000');
        $employment->setCompanyName('Kelurahan');
        $employment->setSourceOfFound('1');
        $employment->setSourceOfFoundOther('1');

        return $employment;
    }

    protected function getIdentities()
    {
        $identities = new Identity;

        $identities->setIdentitiesInfo($this->getIdentityInfo());

        return $identities;
    }

    protected function getIdentityInfo()
    {
        $identityInfo = new IdentityInfo;

        $identityInfo->setIdType('KT');
        $identityInfo->setIdExpiryDate('9999-12-31');
        $identityInfo->setIdName($this->faker->name);
        $identityInfo->setIdNumber('4610815675045937');

        return $identityInfo;
    }

    protected function getKycInfo()
    {
        $kycInfo = new KycOption;

        $kycInfo->setKycType('7');
        $kycInfo->setKycStatus('Success');
        $kycInfo->setAdditionalData('');

        return $kycInfo;
    }
}
