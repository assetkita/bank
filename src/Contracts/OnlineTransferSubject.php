<?php

namespace Assetku\BankService\Contracts;

interface OnlineTransferSubject
{
    /**
     * @return string
     */
    public function onlineTransferFromAccount();

    /**
     * @return string
     */
    public function onlineTransferFromAccountName();

    /**
     * @return string
     */
    public function onlineTransferToBankId();

    /**
     * @return string
     */
    public function onlineTransferToAccount();

    /**
     * @return string
     */
    public function onlineTransferToBankName();

    /**
     * @return int
     */
    public function onlineTransferAmount();

    /**
     * @return string
     */
    public function onlineTransferBeneficiaryEmail();

    /**
     * @return string
     */
    public function onlineTransferBeneficiaryAccountName();

    /**
     * @return string
     */
    public function onlineTransferBeneficiaryPhoneNumber();
}
