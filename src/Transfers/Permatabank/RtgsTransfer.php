<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Transfers\RtgsTransfer as RtgsTransferContract;

class RtgsTransfer extends Transfer implements RtgsTransferContract
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * RtgsTransfer constructor.
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
