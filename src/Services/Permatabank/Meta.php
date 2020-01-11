<?php

namespace Assetku\BankService\Services\Permatabank;

use Assetku\BankService\Exceptions\PermatabankExceptions\DisbursementException;

class Meta
{
    /**
     * @var string
     */
    protected $responseTimestamp;

    /**
     * @var string
     */
    protected $customerReferenceId;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusDescription;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * Meta constructor.
     *
     * @param $messageResponseHeader
     */
    public function __construct($messageResponseHeader)
    {
        $this->responseTimestamp = $messageResponseHeader->ResponseTimestamp ?? null;
        $this->customerReferenceId = $messageResponseHeader->CustRefID;
        $this->statusCode = $messageResponseHeader->StatusCode;
        $this->statusDescription = $messageResponseHeader->StatusDesc;

        if ($messageResponseHeader->StatusCode !== '00') {
            $this->errorMessage = DisbursementException::translateError($messageResponseHeader->StatusCode);
        }
    }

    /**
     * Get permata bank response's response timestamp
     *
     * @return string
     */
    public function getResponseTimestamp()
    {
        return $this->responseTimestamp;
    }

    /**
     * Get permata bank response's customer reference id
     *
     * @return string
     */
    public function getCustomerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * Get permata bank response's status code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get permata bank response's status description
     *
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Get permata bank response's error message
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}
