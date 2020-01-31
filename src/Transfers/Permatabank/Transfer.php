<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Transfers\Transfer as TransferContract;
use Assetku\BankService\Exceptions\PermatabankException;

abstract class Transfer implements TransferContract
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
    protected $error;

    /**
     * Transfer constructor.
     *
     * @param  array  $messageResponseHeader
     */
    public function __construct(array $messageResponseHeader)
    {
        $this->responseTimestamp = $messageResponseHeader['ResponseTimestamp'] ?? null;
        $this->customerReferenceId = $messageResponseHeader['CustRefID'];
        $this->statusCode = $messageResponseHeader['StatusCode'];
        $this->statusDescription = $messageResponseHeader['StatusDesc'];

        if ($this->statusCode !== '00') {
            $this->error = PermatabankException::translate($this->statusCode);
        }
    }

    /**
     * @inheritDoc
     */
    public function responseTimestamp()
    {
        return $this->responseTimestamp;
    }

    /**
     * @inheritDoc
     */
    public function customerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * @inheritDoc
     */
    public function statusCode()
    {
        return $this->statusCode;
    }

    /**
     * @inheritDoc
     */
    public function statusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * @inheritDoc
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * @inheritDoc
     */
    public function isSuccess()
    {
        return $this->statusCode === '00';
    }
}
