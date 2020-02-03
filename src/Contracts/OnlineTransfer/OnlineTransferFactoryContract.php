<?php

namespace Assetku\BankService\Contracts\OnlineTransfer;

use Assetku\BankService\Contracts\Subjects\OnlineTransferSubject;

interface OnlineTransferFactoryContract
{
    /**
     * Create a new online transfer request instance
     *
     * @param  OnlineTransferSubject  $subject
     * @return OnlineTransferRequestContract
     */
    public function makeRequest(OnlineTransferSubject $subject);

    /**
     * Create a new online transfer response instance
     *
     * @param  OnlineTransferRequestContract  $request
     * @param  string  $contents
     * @return OnlineTransferResponseContract
     */
    public function makeResponse(OnlineTransferRequestContract $request, string $contents);
}
