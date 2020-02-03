<?php

namespace Assetku\BankService\OnlineTransferInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryResponseContract;

class OnlineTransferInquiryResponse extends BaseResponse implements OnlineTransferInquiryResponseContract
{
    /**
     * @var string
     */
    protected $transactionReferralNumber;

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
     * OnlineTransferInquiryResponse constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $transactionReferralNumber
     * @param  string  $toAccount
     * @param  string  $toAccountFullName
     * @param  string  $bankId
     * @param  string  $bankName
     */
    public function __construct(
        array $messageResponseHeader,
        string $transactionReferralNumber,
        string $toAccount,
        string $toAccountFullName,
        string $bankId,
        string $bankName
    ) {
        parent::__construct($messageResponseHeader);

        $this->transactionReferralNumber = $transactionReferralNumber;

        $this->toAccount = $toAccount;

        $this->toAccountFullName = $toAccountFullName;

        $this->bankId = $bankId;

        $this->bankName = $bankName;
    }

    /**
     * @inheritDoc
     */
    public function transactionReferralNumber()
    {
        return $this->transactionReferralNumber;
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
