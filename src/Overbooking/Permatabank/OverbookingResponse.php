<?php

namespace Assetku\BankService\Overbooking\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\Overbooking\OverbookingResponseContract;

class OverbookingResponse extends BaseResponse implements OverbookingResponseContract
{
    /**
     * @var string
     */
    protected $transactionReferralNumber;

    /**
     * OverbookingResponse constructor.
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
