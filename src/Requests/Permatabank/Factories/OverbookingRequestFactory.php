<?php

namespace Assetku\BankService\Requests\Permatabank\Factories;

use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Requests\Contracts\Factories\OverbookingRequestFactory as OverbookingRequestFactoryContract;
use Assetku\BankService\Requests\Permatabank\OverbookingRequest;

class OverbookingRequestFactory implements OverbookingRequestFactoryContract
{
    /**
     * @inheritDoc
     */
    public function make(OverbookingSubject $subject)
    {
        return new OverbookingRequest($subject);
    }
}
