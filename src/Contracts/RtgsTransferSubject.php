<?php

namespace Assetku\BankService\Contracts;

interface RtgsTransferSubject
{
    /**
     * @return string
     */
    public function fromAccount();

    /**
     * @return string
     */
    public function toAccount();

    /**
     * @return string
     */
    public function toBankId();

    /**
     * @return string
     */
    public function toBankName();

    /**
     * @return int
     */
    public function amount();

    /**
     * @return
     */
    public function benefEmail();

    /**
     * @return string
     */
    public function benefAccountName();

    /**
     * @return string
     */
    public function benefPhoneNo();

    /**
     * @return string
     */
    public function benefBankAddress();

    /**
     * @return string
     */
    public function benefBankBranchName();

    /**
     * @return string
     */
    public function benefBankCity();

    /**
     * @return string
     */
    public function fromAccountName();

    /**
     * @return string
     */
    public function fromCurrencyCode();

    /**
     * @return string
     */
    public function benefAddress1();

    /**
     * @return string
     */
    public function benefAddress2();

    /**
     * @return string
     */
    public function benefAddress3();

}
