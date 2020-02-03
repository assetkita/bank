<?php

namespace Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo\Products\Product\CasaProduct;

interface AdditionalCasaInfo
{
    /**
     * Get additional casa info's sid
     *
     * @return string
     */
    public function sid();

    /**
     * Get additional casa info's sub account efek
     *
     * @return string
     */
    public function subAccountEfek();

    /**
     * Get additional casa info's corp efek penerima kuasa
     *
     * @return string
     */
    public function corpEfekPenerimaKuasa();

    /**
     * Get additional casa info's currency type
     *
     * @return string
     */
    public function currencyType();

    /**
     * Get additional casa info's group id head to head
     *
     * @return string
     */
    public function groupIdH2H();

    /**
     * Get additional casa info's group id PEB
     *
     * @return string
     */
    public function groupIdPEB();
}
