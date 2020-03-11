<?php

namespace Assetku\BankService\Base\Permatabank;

use Assetku\BankService\Contracts\Base\BaseResponseContract;
use Assetku\BankService\Exceptions\PermatabankException;

abstract class BaseResponse implements BaseResponseContract
{
    /**
     * @var string
     */
    protected $responseTimestamp;

    /**
     * @var string
     */
    protected $customerReferralId;

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
     * BaseResponse constructor.
     *
     * @param  array  $messageResponseHeader
     */
    public function __construct(array $messageResponseHeader)
    {
        if (isset($messageResponseHeader['ResponseTimestamp'])) {
            $this->responseTimestamp = $messageResponseHeader['ResponseTimestamp'];
        } elseif (isset($messageResponseHeader['RequestTimestamp'])) {
            $this->responseTimestamp = $messageResponseHeader['RequestTimestamp'];
        } else {
            $this->responseTimestamp = null;
        }

        $this->customerReferralId = $messageResponseHeader['CustRefID'];

        $this->statusCode = $messageResponseHeader['StatusCode'];

        $this->statusDescription = isset($messageResponseHeader['StatusDesc']) ? $messageResponseHeader['StatusDesc'] : null;

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
    public function customerReferralId()
    {
        return $this->customerReferralId;
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
