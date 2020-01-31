<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\RtgsTransferRequestFactory;
use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;

class RtgsTransferRequestManager implements RtgsTransferRequestFactory
{
    /**
     * @inheritDoc
     */
    public function make(RtgsTransferSubject $subject)
    {
        return new RtgsTransferRequest($subject);
    }
}
