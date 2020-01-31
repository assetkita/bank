<?php

namespace Assetku\BankService\Contracts\Subjects;

interface OverbookingSubject
{
    /**
     * Get overbooking's from toAccount
     *
     * @return string
     */
    public function overbookingFromAccount();

    /**
     * Get overbooking's from toAccount name
     *
     * @return string
     */
    public function overbookingFromAccountName();

    /**
     * Get overbooking's from bank name
     *
     * @return string
     */
    public function overbookingFromBankName();

    /**
     * Get overbooking's to toAccount
     *
     * @return string
     */
    public function overbookingToAccount();

    /**
     * Get overbooking's to toAccount name
     *
     * @return string
     */
    public function overbookingToAccountName();

    /**
     * Get overbooking's to bank name
     *
     * @return string
     */
    public function overbookingToBankName();

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
     * Get overbooking's beneficiary toAccount name
     *
     * @return string
     */
    public function overbookingBeneficiaryAccountName();
}
