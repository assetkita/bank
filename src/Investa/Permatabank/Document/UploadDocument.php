<?php

namespace Assetku\BankService\Investa\Permatabank\Document;

class UploadDocument
{
    /**
     * @var $bankRefId
     */
    protected $bankRefId;

    /**
     * @var $docType
     */
    protected $docType;
    
    /**
     * @var $docName
     */
    protected $docName;

    /**
     * @var $docContent
     */
    protected $docContent;

    /**
     * @var $docContentType
     */
    protected $docContentType;

    /**
     * set bank reff id
     * 
     * @var string $bankRefId
     */
    public function setBankRefId(string $bankRefId)
    {
        $this->bankRefId = $bankRefId;

        return $this;
    }

    /**
     * set document type
     * 
     * @var string $docType
     */
    public function setDocType(string $docType)
    {
        $this->docType = $docType;

        return $this;
    }

    /**
     * set document content
     * 
     * @var string $docContent
     */
    public function setDocContent(string $docContent)
    {
        $this->docContent = $docContent;
        
        return $this;
    }

    /**
     * set document content type
     * 
     * @var string $docContentType
     */
    public function docContentType(string $docContentType)
    {
        $this->docContentType = $docContentType;

        return $this;
    }
}
