<?php

namespace Assetku\BankService\StatusTransactionInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryResponseContract;

class StatusTransactionInquiryResponse extends BaseResponse implements StatusTransactionInquiryResponseContract
{
    /**
     * @var string
     */
    protected $transactionReferralNumber;

    /**
     * StatusTransactionInquiryResponse constructor.
     *
     * @param  array  $statusTransactionResponse
     * @param  string  $transactionReferralNumber
     */
    public function __construct(array $statusTransactionResponse, string $transactionReferralNumber)
    {
        parent::__construct($statusTransactionResponse);

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
