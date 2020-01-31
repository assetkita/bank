<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Transfers\OnlineTransfer as OnlineTransferContract;

class OnlineTransfer extends Transfer implements OnlineTransferContract
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * OnlineTransfer constructor.
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
