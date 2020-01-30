<?php

namespace Assetku\BankService\Requests\Permatabank\Factories;

use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Requests\Contracts\Factories\OnlineTransferRequestFactory as OnlineTransferRequestFactoryContract;
use Assetku\BankService\Requests\Permatabank\OnlineTransferRequest;

class OnlineTransferRequestFactory implements OnlineTransferRequestFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(OnlineTransferSubject $subject)
    {
        return new OnlineTransferRequest($subject);
    }
}
