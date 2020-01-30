<?php

namespace Assetku\BankService\Requests\Permatabank\Encoders;

use Assetku\BankService\Requests\Permatabank\Encoders\Contracts\Encoder;

class FormParamsEncoder implements Encoder
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
