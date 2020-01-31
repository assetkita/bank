<?php

namespace Assetku\BankService\Inquiries\Permatabank;

use Assetku\BankService\Contracts\Inquiries\StatusTransactionInquiry as StatusTransactionInquiryContract;

class StatusTransactionInquiry extends Inquiry implements StatusTransactionInquiryContract
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * StatusTransactionInquiry constructor.
     *
     * @param  array  $statusTransactionResponse
     * @param  string  $transactionReferenceNumber
     */
    public function __construct(array $statusTransactionResponse, string $transactionReferenceNumber)
    {
        parent::__construct($statusTransactionResponse);

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
