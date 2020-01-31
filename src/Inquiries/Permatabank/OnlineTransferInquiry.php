<?php

namespace Assetku\BankService\Inquiries\Permatabank;

use Assetku\BankService\Contracts\Inquiries\OnlineTransferInquiry as OnlineTransferInquiryContract;

class OnlineTransferInquiry extends Inquiry implements OnlineTransferInquiryContract
{
    /**
     * @var string
     */
    protected $transactionReferenceNumber;

    /**
     * @var string
     */
    protected $toAccount;

    /**
     * @var string
     */
    protected $toAccountFullName;

    /**
     * @var string
     */
    protected $bankId;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * OnlineTransferInquiry constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $transactionReferenceNumber
     * @param  string  $toAccount
     * @param  string  $toAccountFullName
     * @param  string  $bankId
     * @param  string  $bankName
     */
    public function __construct(
        array $messageResponseHeader,
        string $transactionReferenceNumber,
        string $toAccount,
        string $toAccountFullName,
        string $bankId,
        string $bankName
    ) {
        parent::__construct($messageResponseHeader);

        $this->transactionReferenceNumber = $transactionReferenceNumber;

        $this->toAccount = $toAccount;

        $this->toAccountFullName = $toAccountFullName;

        $this->bankId = $bankId;

        $this->bankName = $bankName;
    }

    /**
     * @inheritDoc
     */
    public function transactionReferenceNumber()
    {
        return $this->transactionReferenceNumber;
    }

    /**
     * @inheritDoc
     */
    public function toAccount()
    {
        return $this->toAccount;
    }

    /**
     * @inheritDoc
     */
    public function toAccountFullName()
    {
        return $this->toAccountFullName;
    }

    /**
     * @inheritDoc
     */
    public function bankId()
    {
        return $this->bankId;
    }

    /**
     * @inheritDoc
     */
    public function bankName()
    {
        return $this->bankName;
    }
}
