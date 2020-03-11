<?php

namespace Assetku\BankService\Contracts\NotifAccountOpeningStatus;

interface NotifAccountOpeningStatusFactoryInterface
{
    /**
     * Create a new notif account opening status handler instance
     *
     * @param  string  $contents
     * @return NotifAccountOpeningStatusHandlerInterface
     */
    public function makeHandler(string $contents);
}
