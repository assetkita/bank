<?php

namespace Assetku\BankService\Inquiries\Permatabank;

use Assetku\BankService\Contracts\Inquiries\OverbookingInquiry as OverbookingInquiryContract;

class OverbookingInquiry extends Inquiry implements OverbookingInquiryContract
{
    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @var string
     */
    protected $accountName;

    /**
     * OverbookingInquiry constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $accountNumber
     * @param  string  $accountName
     */
    public function __construct(
        array $messageResponseHeader,
        string $accountNumber,
        string $accountName
    )
    {
        parent::__construct($messageResponseHeader);

        $this->accountNumber = $accountNumber;

        $this->accountName = $accountName;
    }

    /**
     * @inheritDoc
     */
    public function accountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @inheritDoc
     */
    public function accountName()
    {
        return $this->accountName;
    }
}
