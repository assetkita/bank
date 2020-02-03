<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;

use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Employments\EmploymentInfo;

interface Employments
{
    /**
     * Get employments' employment info
     *
     * @return EmploymentInfo
     */
    public function employmentInfo();
}
