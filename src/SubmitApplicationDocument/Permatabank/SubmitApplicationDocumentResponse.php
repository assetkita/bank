<?php

namespace Assetku\BankService\SubmitApplicationDocument\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;

class SubmitApplicationDocumentResponse extends BaseResponse
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
