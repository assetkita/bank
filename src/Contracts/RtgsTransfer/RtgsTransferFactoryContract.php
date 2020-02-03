<?php

namespace Assetku\BankService\Contracts\RtgsTransfer;

use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;

interface RtgsTransferFactoryContract
{
    /**
     * Create a new rtgs transfer request instance
     *
     * @param  RtgsTransferSubject  $subject
     * @return RtgsTransferRequestContract
     */
    public function makeRequest(RtgsTransferSubject $subject);

    /**
     * Create a new rtgs transfer response instance
     *
     * @param  RtgsTransferRequestContract  $request
     * @param  string  $contents
     * @return RtgsTransferResponseContract
     */
    public function makeResponse(RtgsTransferRequestContract $request, string $contents);
}
