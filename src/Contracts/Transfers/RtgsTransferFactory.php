<?php

namespace Assetku\BankService\Contracts\Transfers;

use Assetku\BankService\Contracts\Requests\RtgsTransferRequest;

interface RtgsTransferFactory
{
    /**
     * Create a new rtgs transfer instance
     *
     * @param  RtgsTransferRequest  $request
     * @param  string  $contents
     * @return RtgsTransfer
     */
    public function make(RtgsTransferRequest $request, string $contents);
}
