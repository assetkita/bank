<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\OnlineTransferRequestFactory;
use Assetku\BankService\Contracts\Subjects\OnlineTransferSubject;

class OnlineTransferRequestManager implements OnlineTransferRequestFactory
{
    /**
     * @inheritDoc
     */
    public function make(OnlineTransferSubject $subject)
    {
        return new OnlineTransferRequest($subject);
    }
}
