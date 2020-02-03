<?php

namespace Assetku\BankService\RtgsTransfer\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\RtgsTransfer\RtgsTransferResponseContract;

class RtgsTransferResponse extends BaseResponse implements RtgsTransferResponseContract
{
    /**
     * @var string
     */
    protected $transactionReferralNumber;

    /**
     * RtgsTransferResponse constructor.
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
