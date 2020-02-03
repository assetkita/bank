<?php

namespace Assetku\BankService\Encoders\Permatabank;

use Assetku\BankService\Contracts\EncoderContract;

class FormParamsEncoder implements EncoderContract
{
    /**
     * @inheritDoc
     */
    public function type()
    {
        return 'form_params';
    }

    /**
     * @inheritDoc
     */
    public function encode(array $data)
    {
        return http_build_query($data);
    }
}
