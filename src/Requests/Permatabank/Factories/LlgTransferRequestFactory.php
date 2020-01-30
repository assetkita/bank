<?php

namespace Assetku\BankService\Requests\Permatabank\Factories;

use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Requests\Contracts\Factories\LlgTransferRequestFactory as LlgTransferRequestFactoryContract;
use Assetku\BankService\Requests\Permatabank\LlgTransferRequest;

class LlgTransferRequestFactory implements LlgTransferRequestFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(LlgTransferSubject $subject)
    {
        return new LlgTransferRequest($subject);
    }
}
