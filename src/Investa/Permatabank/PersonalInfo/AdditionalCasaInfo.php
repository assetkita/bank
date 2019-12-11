<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

class AdditionalCasaInfo implements Serializeable
{
    /**
     * @var $sid
     */
    protected $sid;
    
    /**
     * @var $subAcctEfek
     */
    protected $subAcctEfek;

    /**
     * @var $corpEfekPenerimaKuasa
     */
    protected $corpEfekPenerimaKuasa;

    /**
     * @var $currencyType
     */
    protected $currencyType;

    /**
     * @var $groupIdH2H
     */
    protected $groupIdH2H;

    /**
     * @var $groupIdPEB
     */
    protected $groupIdPEB;

    public function setSid(string $sid)
    {
        $this->sid = $sid;
        
        return $this;
    }

    public function setSubAcctEfek(string $subAcctEfek)
    {
        $this->subAcctEfek = $subAcctEfek;

        return $this;
    }
   
    public function setCorpEfekPenerimaKuasa(string $corpEfekPenerimaKuasa)
    {
        $this->corpEfekPenerimaKuasa = $corpEfekPenerimaKuasa;

        return $this;
    }

    public function setCurrencyType(string $currencyType)
    {
        $this->currencyType = $currencyType;

        return $this;
    }

    public function setGroupIdH2H(string $groupIdH2H)
    {
        $this->groupIdH2H = $groupIdH2H;

        return $this;
    }

    public function setGroupIdPEB(string $groupIdPEB)
    {
        return $this->groupIdPEB = $groupIdPEB;

        return $this;
    }

    public function toArray()
    {
        return [
            'SID' => $this->sid,
            'SubAcctEfek' => $this->subAcctEfek,
            'CorpEfekPenerimaKuasa' => $this->corpEfekPenerimaKuasa,
            'CurrencyType' => $this->currencyType,
            'GroupIdH2H' => $this->groupIdH2H,
            'GroupIdPEB' => $this->groupIdPEB
        ];
    }
}
