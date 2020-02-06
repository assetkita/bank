<?php

namespace Assetku\BankService\SubmitApplicationDocument\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentResponseContract;

class SubmitApplicationDocumentResponse extends BaseResponse implements SubmitApplicationDocumentResponseContract
{
    /**
     * SubmitApplicationDocumentResponse constructor.
     *
     * @param  array  $messageResponseHeader
     */
    public function __construct(array $messageResponseHeader)
    {
        parent::__construct($messageResponseHeader);
    }
}
