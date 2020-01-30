<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Requests\Contracts\AccessTokenRequest as GetTokenRequestContract;
use Assetku\BankService\Requests\Contracts\MustValidated;
use Assetku\BankService\Requests\Permatabank\Encoders\FormParamsEncoder;
use Assetku\BankService\Requests\Permatabank\Headers\AuthHeader;

class AccessTokenRequest extends Request implements GetTokenRequestContract, MustValidated
{
    /**
     * @inheritDoc
     */
    public function method()
    {
        return 'POST';
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'oauth/token';
    }

    /**
     * @inheritDoc
     */
    public function encoder()
    {
        return new FormParamsEncoder;
    }

    /**
     * @inheritDoc
     */
    public function data()
    {
        return [
            'grant_type' => 'client_credentials',
        ];
    }

    /**
     * @inheritDoc
     */
    public function header()
    {
        return new AuthHeader($this);
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'grant_type' => 'required|string|in:client_credentials',
        ];
    }

    /**
     * @inheritDoc
     */
    public function messages()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function customAttributes()
    {
        return [
            'grant_type' => 'jenis pemberian',
        ];
    }
}
