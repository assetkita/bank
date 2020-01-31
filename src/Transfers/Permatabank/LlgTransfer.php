<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Transfers\LlgTransfer as LlgTransferContract;

class LlgTransfer extends Transfer implements LlgTransferContract
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * LlgTransfer constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $transactionReferenceNumber
     */
    public function __construct(array $messageResponseHeader, string $transactionReferenceNumber)
    {
        parent::__construct($messageResponseHeader);

        $this->transactionReferenceNumber = $transactionReferenceNumber;
    }

    /**
     * @inheritDoc
     */
    public function transactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }
}
