<?php

namespace Assetku\BankService\Encoders\Permatabank;

use Assetku\BankService\Contracts\EncoderInterface;

class JsonEncoder  implements EncoderInterface
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
        return json_encode($data);
    }
}
