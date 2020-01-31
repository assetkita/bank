<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\AccessTokenRequest as GetTokenRequestContract;
use Assetku\BankService\Contracts\Requests\MustValidated;
use Assetku\BankService\Encoders\Permatabank\FormParamsEncoder;
use Assetku\BankService\Headers\Permatabank\AuthHeader;

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
