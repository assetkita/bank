<?php

namespace Assetku\BankService\Contracts\Overbooking;

use Assetku\BankService\Contracts\Subjects\OverbookingSubject;

interface OverbookingFactoryContract
{
    /**
     * Create a new overbooking request instance
     *
     * @param  OverbookingSubject  $subject
     * @return OverbookingResponseContract
     */
    public function makeRequest(OverbookingSubject $subject);

    /**
     * Create a new overbooking response instance
     *
     * @param  OverbookingRequestContract  $request
     * @param  string  $contents
     * @return OverbookingResponseContract
     */
    public function makeResponse(OverbookingRequestContract $request, string $contents);
}
