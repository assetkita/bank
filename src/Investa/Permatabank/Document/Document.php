<?php

namespace Assetku\BankService\Investa\Permatabank\Document;

class Document
{
    /**
     * @var string
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $custRefID;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusDesc;

    /**
     * constructor
     * 
     * @param object $document
     */
    public function __construct($document)
    {
        $response = $document->SubmitAppDocNotificationRs->MsgRsHdr;

        $this->timestamp = $response->ResponseTimestamp;

        $this->custRefID = $response->CustRefID;

        $this->statusCode = $response->StatusCode;

        $this->statusDesc = $response->StatusDesc;
    }

    /**
     * get status code
     * 
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * get status desc
     * 
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDesc;
    }
}
