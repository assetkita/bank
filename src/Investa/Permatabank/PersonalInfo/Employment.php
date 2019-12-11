<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\utils\Serialize;

use Assetku\BankService\Contracts\Serializeable;

class Employment implements Serializeable
{
    use Serialize;

    /**
     * @var $employmentType
     */
    protected $employmentType;

    /**
     * @var $position
     */
    protected $position;

    /**
     * @var $department
     */
    protected $department;

    /**
     * @var $employmentStatus
     */
    protected $employmentStatus;

    /**
     * @var $economySector
     */
    protected $economySector;

    /**
     * @var $economySectorOthers
     */
    protected $economySectorOthers;

    /**
     * @var $lengthOfServiceYear
     */
    protected $lengthOfServiceYear;

    /**
     * @var $lengthOfServiceMonth
     */
    protected $lengthOfServiceMonth;

    /**
     * @var $monthlyIncomeCode
     */
    protected $monthlyIncomeCode;

    /**
     * @var $monthlyIncome
     */
    protected $monthlyIncome;

    /**
     * @var $companyName
     */
    protected $companyName;

    /**
     * @var $sourceOfFound
     */
    protected $sourceOfFound;

    /**
     * @var $sourceOfFoundOther
     */
    protected $sourceOfFoundOther;

    public function setEmploymentType(string $employmentType)
    {
        $this->employmentType = $employmentType;
        
        return $this;
    }

    public function setPosition(string $position)
    {
        $this->position = $position;

        return $this;
    }

    public function setDepartment(string $department)
    {
        $this->department = $department;

        return $this;
    }

    public function setEmploymentStatus(string $employmentStatus)
    {
        $this->employmentStatus = $employmentStatus;

        return $this;
    }

    public function setEconomySector(string $economySector)
    {
        $this->economySector = $economySector;

        return $this;
    }

    public function setEconomySectorOthers(string $economySectorOthers)
    {
        $this->economySectorOthers = $economySectorOthers;

        return $this;
    }

    public function setLengthOfServiceMonth(string $lengthOfServiceMonth)
    {
        $this->lengthOfServiceMonth = $lengthOfServiceMonth;

        return $this;
    }

    public function setLengthOfServiceYear(string $lengthOfServiceYear)
    {
        $this->lengthOfServiceYear = $lengthOfServiceYear;

        return $this;
    }

    public function setMonthlyIncomeCode(string $monthlyIncomeCode)
    {
        $this->monthlyIncomeCode = $monthlyIncomeCode;
        
        return $this;
    }

    public function setMonthlyIncome(string $monthlyIncome)
    {
        $this->monthlyIncome = $monthlyIncome;

        return $this;
    }

    public function setCompanyName(string $companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function setSourceOfFound(string $sourceOfFound)
    {
        $this->sourceOfFound = $sourceOfFound;

        return $this;
    }

    public function setSourceOfFoundOther(string $sourceOfFoundOther)
    {
        $this->sourceOfFoundOther = $sourceOfFoundOther;

        return $this;
    }

    public function toArray()
    {
        return [
            'EmploymentInfo' => [
                'EmploymentType' => $this->employmentType,
                'Position' => $this->position,
                'Department' => $this->department,
                'EmploymentStatus' => $this->employmentStatus,
                'EconomySector' => $this->economySector,
                'EconomySectorOthers' => $this->economySectorOthers,
                'LengthOfServiceYear' => $this->lengthOfServiceYear,
                'LengthOfServiceMonth' => $this->lengthOfServiceMonth,
                'MonthlyIncomeCode' => $this->monthlyIncomeCode,
                'MonthlyIncome' => $this->monthlyIncome,
                'CompanyName' => $this->companyName,
                'SourceOfFund' => $this->sourceOfFound,
                'SourceOfFundOther' => $this->sourceOfFoundOther
            ]
        ];
    }
}
