<?php

namespace Assetku\BankService\Encoders\Permatabank;

use Assetku\BankService\Contracts\EncoderInterface;

class JsonEncoderUnescapedSlashes implements EncoderInterface
{
    /**
     * @inheritDoc
     */
    public function type()
    {
        return 'data';
    }

    /**
     * @inheritDoc
     */
    public function encode(array $data)
    {
        return json_encode($data, JSON_UNESCAPED_SLASHES);
    }
}
