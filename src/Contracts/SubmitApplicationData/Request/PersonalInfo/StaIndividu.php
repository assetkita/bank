<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;

interface StaIndividu
{
    /**
     * Get sta individu's customer name
     *
     * @return string
     */
    public function customerName();
    /**
     * Get sta individu's city of birth
     *
     * @return string
     */
    public function cityOfBirth();

    /**
     * Get sta individu's date of birth
     *
     * @return string
     */
    public function dateOfBirth();

    /**
     * Get sta individu's country of birth
     *
     * @return string
     */
    public function countryOfBirth();

    /**
     * Get sta individu's gender
     *
     * @return string
     */
    public function gender();

    /**
     * Get sta individu's marital status
     *
     * @return string
     */
    public function maritalStatus();

    /**
     * Get sta individu's last education status
     *
     * @return string
     */
    public function lastEducationStatus();

    /**
     * Get sta individu's no of dependant
     *
     * @return string
     */
    public function noOfDependant();

    /**
     * Get sta individu's nationality
     *
     * @return string
     */
    public function nationality();

    /**
     * Get sta individu's email address
     *
     * @return string
     */
    public function emailAddress();

    /**
     * Get sta individu's mother maiden name
     *
     * @return string
     */
    public function motherMaidenName();

    /**
     * Get sta individu's resident status
     *
     * @return string
     */
    public function residentStatus();

    /**
     * Get sta individu's flag AS CASA
     *
     * @return string
     */
    public function flagASCASA();

    /**
     * Get sta individu's deposit transaction count
     *
     * @return string
     */
    public function depositTransactionCount();

    /**
     * Get sta individu's deposit transaction amount
     *
     * @return string
     */
    public function depositTransactionAmount();

    /**
     * Get sta individu's withdrawal transaction count
     *
     * @return string
     */
    public function withdrawalTransactionCount();

    /**
     * Get sta individu's withdrawal transaction amount
     *
     * @return string
     */
    public function withdrawalTransactionAmount();

    /**
     * Get sta individu's promo code
     *
     * @return string
     */
    public function promoCode();
}
