<?php

namespace Assetku\BankService\Services\Permatabank;

class Response
{
    /**
     * @var Meta
     */
    protected $meta;

    /**
     * @var bool
     */
    protected $success = false;

    /**
     * Response constructor.
     *
     * @param $messageResponseHeader
     */
    public function __construct($messageResponseHeader)
    {
        $this->meta = new Meta($messageResponseHeader);
    }

    /**
     * Get response's metadata
     *
     * @return Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Get balance inquiry's success status
     *
     * @return string
     */
    public function isSuccess()
    {
        return $this->success;
    }
}
