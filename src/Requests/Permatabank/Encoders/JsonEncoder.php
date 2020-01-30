<?php

namespace Assetku\BankService\Requests\Permatabank\Encoders;

use Assetku\BankService\Requests\Permatabank\Encoders\Contracts\Encoder;

class JsonEncoder implements Encoder
{
    /**
     * @inheritDoc
     */
    public function type()
    {
        return 'json';
    }

    /**
     * @inheritDoc
     */
    public function encode(array $data)
    {
        return json_encode($data, JSON_UNESCAPED_SLASHES);
    }
}
