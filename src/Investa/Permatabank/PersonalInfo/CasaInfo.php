<?php

namespace Assetku\BankService\Investa\Permatabank\PersonalInfo;

use Assetku\BankService\Contracts\Serializeable;

class CasaInfo implements Serializeable
{
    /**
     * @var $seqNo
     */
    protected $seqNo;

    /**
     * @var $staProductCode
     */
    protected $staProductCode;

    /**
     * @var $productFamily
     */
    protected $productFamily;

    /**
     * @var $productFamily
     */
    protected $productType;

    /**
     * @var $branchId
     */
    protected $branchId;

    /**
     * @var $source
     */
    protected $source;

    /**
     * @var $purpose
     */
    protected $purpose;

    /**
     * @var $purposeOther
     */
    protected $purposeOther;

    /**
     * @var $opening
     */
    protected $opening;

    /**
     * @var $openingOther
     */
    protected $openingOther;

    /**
     * @var $addressStatement
     */
    protected $addressStatement;

    /**
     * @var AdditionalCasaInfo
     */
    protected $additionalCasaInfo;

    /**
     * set additional casa info
     * 
     * @param AdditionalCasaInfo $additionalCasaInfo
     * @return $this
     */
    public function setAdditionalCasaInfo(AdditionalCasaInfo $additionalCasaInfo)
    {
        $this->additionalCasaInfo = $additionalCasaInfo;

        return $this;
    }

    public function setAddressStatement(string $addressStatement)
    {
        $this->addressStatement = $addressStatement;
        
        return $this;
    }

    public function setOpeningOther(string $openingOther)
    {
        $this->openingOther = $openingOther;
        
        return $this;
    }

    public function setOpening(string $opening)
    {
        $this->opening = $opening;
        
        return $this;
    }
    
    public function setPurposeOther(string $purposeOther)
    {
        $this->purposeOther = $purposeOther;
        
        return $this;
    }

    public function setPurpose(string $purpose)
    {
        $this->purpose = $purpose;
        
        return $this;
    }

    public function setSource(string $source)
    {
        $this->source = $source;
        
        return $this;
    }

    public function setBranchId(string $branchId)
    {
        $this->branchId = $branchId;
        
        return $this;
    }

    public function setProductType(string $productType)
    {
        $this->productType = $productType;
        
        return $this;
    }

    public function setProductFamily(string $productFamily)
    {
        $this->productFamily = $productFamily;
        
        return $this;
    }

    public function setStaProductCode(string $staProductCode)
    {
        $this->staProductCode = $staProductCode;
        
        return $this;
    }

    public function setSeqNo(string $seqNo)
    {
        $this->seqNo = $seqNo;
        
        return $this;
    }

    public function toArray()
    {
        return [
            'SeqNo' => $this->seqNo,
            'StaProductCode' => $this->staProductCode,
            'ProductFamily' => $this->productFamily,
            'ProductType' => $this->productType,
            'BranchId' => $this->branchId,
            'Source' => $this->source,
            'Purpose' => $this->purpose,
            'PurposeOther' => $this->purposeOther,
            'Opening' => $this->opening,
            'OpeningOther' => $this->openingOther,
            'AddressStatement' => $this->addressStatement,
            'AdditionalCasaInfo' => $this->additionalCasaInfo->toArray()
        ];
    }
}
