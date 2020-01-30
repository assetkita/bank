<?php

namespace Assetku\BankService\Requests\Contracts\Factories;

use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Requests\Contracts\OverbookingRequest;

interface OverbookingRequestFactory
{
    /**
     * Create a new overbooking request instance
     *
     * @param  OverbookingSubject  $subject
     * @return OverbookingRequest
     */
    public function make(OverbookingSubject $subject);
}
