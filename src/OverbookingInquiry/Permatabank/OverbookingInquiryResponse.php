<?php

namespace Assetku\BankService\OverbookingInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\OverbookingInquiry\OverbookingInquiryResponseContract;

class OverbookingInquiryResponse extends BaseResponse implements OverbookingInquiryResponseContract
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
     * OverbookingInquiryResponse constructor.
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
