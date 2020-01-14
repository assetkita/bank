<?php

namespace Assetku\BankService\Contracts;

interface OverbookingSubject
{
    /**
     * Get overbooking's from account
     *
     * @return string
     */
    public function overbookingFromAccount();

    /**
     * Get overbooking's from account name
     *
     * @return string
     */
    public function overbookingFromAccountName();

    /**
     * Get overbooking's to account
     *
     * @return string
     */
    public function overbookingToAccount();

    /**
     * Get overbooking's amount
     *
     * @return int|float|double
     */
    public function overbookingAmount();

    /**
     * Get overbooking's transaction description
     *
     * @return string
     */
    public function overbookingTransactionDescription();

    /**
     * Get overbooking's beneficiary account name
     *
     * @return string
     */
    public function overbookingBeneficiaryAccountName();
}