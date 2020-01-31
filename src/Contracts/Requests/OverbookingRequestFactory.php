<?php

namespace Assetku\BankService\Contracts\Requests;

use Assetku\BankService\Contracts\Subjects\OverbookingSubject;

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
