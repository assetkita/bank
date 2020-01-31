<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\LlgTransferRequestFactory;
use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;

class LlgTransferRequestManager implements LlgTransferRequestFactory
{
    /**
     * @inheritDoc
     */
    public function make(LlgTransferSubject $subject)
    {
        return new LlgTransferRequest($subject);
    }
}
