<?php

namespace Assetku\BankService\SubmitApplicationData\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataResponseContract;

class SubmitApplicationDataResponse extends BaseResponse implements SubmitApplicationDataResponseContract
{
    /**
     * @var string
     */
    protected $referralCode;

    /**
     * SubmitApplicationDataResponse constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $referralCode
     */
    public function __construct(array $messageResponseHeader, string $referralCode)
    {
        parent::__construct($messageResponseHeader);

        $this->referralCode = $referralCode;
    }

    /**
     * @inheritDoc
     */
    public function referralCode()
    {
        return $this->referralCode;
    }
}
