<?php

namespace Assetku\BankService\UpdateKYCStatus\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\UpdateKYCStatus\UpdateKYCStatusResponseContract;

class UpdateKYCStatusResponse extends BaseResponse implements UpdateKYCStatusResponseContract
{
    /**
     * UpdateKYCStatusResponse constructor.
     *
     * @param  array  $messageResponseHeader
     */
    public function __construct(array $messageResponseHeader)
    {
        parent::__construct($messageResponseHeader);
    }
}
