<?php

namespace Assetku\BankService\UpdateKycStatus\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusResponseContract;

class UpdateKycStatusResponse extends BaseResponse implements UpdateKycStatusResponseContract
{
    /**
     * UpdateKycStatusResponse constructor.
     *
     * @param  array  $messageResponseHeader
     */
    public function __construct(array $messageResponseHeader)
    {
        parent::__construct($messageResponseHeader);
    }
}
