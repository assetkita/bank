<?php

namespace Assetku\BankService\Contracts\NotifAccountOpeningStatus;

use Illuminate\Http\Request;

interface NotifAccountOpeningStatusResponse
{
    /**
     * Parse the given request
     *
     * @param  Request  $request
     * @return $this
     */
    public function parse(Request $request);

    /**
     * Parse the given request
     *
     * @return $this
     */
    public function products();
}
