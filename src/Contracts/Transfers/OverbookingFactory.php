<?php

namespace Assetku\BankService\Contracts\Transfers;

use Assetku\BankService\Contracts\Requests\OverbookingRequest;

interface OverbookingFactory
{
    /**
     * Create a new overbooking instance
     *
     * @param  OverbookingRequest  $request
     * @param  string  $contents
     * @return Overbooking
     */
    public function make(OverbookingRequest $request, string $contents);
}
