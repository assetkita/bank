<?php

namespace Assetku\BankService\OnlineTransfer\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\OnlineTransfer\OnlineTransferResponseContract;

class OnlineTransferResponse extends BaseResponse implements OnlineTransferResponseContract
{
    /**
     * @var string
     */
    protected $transactionReferralNumber;

    /**
     * OnlineTransferResponse constructor.
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
