<?php

namespace Assetku\BankService\LlgTransfer\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\LlgTransfer\LlgTransferResponseContract;

class LlgTransferResponse extends BaseResponse implements LlgTransferResponseContract
{
    /**
     * @var string
     */
    protected $transactionReferralNumber;

    /**
     * LlgTransferResponse constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $transactionReferralNumber
     */
    public function __construct(array $messageResponseHeader, string $transactionReferralNumber)
    {
        parent::__construct($messageResponseHeader);

        $this->transactionReferralNumber = $transactionReferralNumber;
    }

    /**
     * @inheritDoc
     */
    public function transactionReferralNumber()
    {
        return $this->transactionReferralNumber;
    }
}
