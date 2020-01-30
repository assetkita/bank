<?php

namespace Assetku\BankService\Requests\Permatabank\Factories;

use Assetku\BankService\Contracts\RtgsTransferSubject;
use Assetku\BankService\Requests\Contracts\Factories\RtgsTransferRequestFactory as RtgsTransferRequestFactoryContract;
use Assetku\BankService\Requests\Permatabank\RtgsTransferRequest;

class RtgsTransferRequestFactory implements RtgsTransferRequestFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(RtgsTransferSubject $subject)
    {
        return new RtgsTransferRequest($subject);
    }
}
