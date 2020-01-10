<?php

namespace Assetku\BankService\Contracts;

interface OnlineTransferSubject
{
    /**
     * Get online transfer's from account
     *
     * @return string
     */
    public function onlineTransferFromAccount();

    /**
     * Get online transfer's from account name
     *
     * @return string
     */
    public function onlineTransferFromAccountName();

    /**
     * Get online transfer's to bank identifier
     *
     * @return string
     */
    public function onlineTransferToBankIdentifier();

    /**
     * Get online transfer's to bank account
     *
     * @return string
     */
    public function onlineTransferToAccount();

    /**
     * Get online transfer's to bank name
     *
     * @return string
     */
    public function onlineTransferToBankName();

    /**
     * Get online transfer's amount
     *
     * @return int
     */
    public function onlineTransferAmount();

    /**
     * Get online transfer's beneficiary account name
     *
     * @return string
     */
    public function onlineTransferBeneficiaryAccountName();

    /**
     * Get online transfer's beneficiary email
     *
     * @return string
     */
    public function onlineTransferBeneficiaryEmail();

    /**
     * Get online transfer's beneficiary phone number
     *
     * @return string
     */
    public function onlineTransferBeneficiaryPhoneNumber();
}
