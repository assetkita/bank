<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\OverbookingRequestFactory;
use Assetku\BankService\Contracts\Subjects\OverbookingSubject;

class OverbookingRequestManager implements OverbookingRequestFactory
{
    /**
     * @inheritDoc
     */
    public function make(OverbookingSubject $subject)
    {
        return new OverbookingRequest($subject);
    }
}
