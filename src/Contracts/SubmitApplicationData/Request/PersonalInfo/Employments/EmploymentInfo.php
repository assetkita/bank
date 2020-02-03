<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Employments;

interface EmploymentInfo
{
    /**
     * Get employment info's employment type
     *
     * @return string
     */
    public function employmentType();

    /**
     * Get employment info's position
     *
     * @return string
     */
    public function position();

    /**
     * Get employment info's department
     *
     * @return string
     */
    public function department();

    /**
     * Get employment info's employment status
     *
     * @return string
     */
    public function employmentStatus();

    /**
     * Get employment info's economy sector
     *
     * @return string
     */
    public function economySector();

    /**
     * Get employment info's economy sector other
     *
     * @return string
     */
    public function economySectorOther();

    /**
     * Get employment info's length of service year
     *
     * @return string
     */
    public function lengthOfServiceYear();

    /**
     * Get employment info's length of service month
     *
     * @return string
     */
    public function lengthOfServiceMonth();

    /**
     * Get employment info's monthly income code
     *
     * @return string
     */
    public function monthlyIncomeCode();

    /**
     * Get employment info's monthly income
     *
     * @return string
     */
    public function monthlyIncome();

    /**
     * Get employment info's company name
     *
     * @return string
     */
    public function companyName();

    /**
     * Get employment info's source of fund
     *
     * @return string
     */
    public function sourceOfFund();

    /**
     * Get employment info's source of fund other
     *
     * @return string
     */
    public function sourceOfFundOther();
}
