<?php

namespace Assetku\BankService\Transfers\Permatabank;

use Assetku\BankService\Contracts\Transfers\Overbooking as OverbookingContract;

class Overbooking extends Transfer implements OverbookingContract
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * Overbooking constructor.
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
