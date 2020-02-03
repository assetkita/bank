<?php

namespace Assetku\BankService\AccessToken\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\AccessToken\AccessTokenRequestContract;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Encoders\Permatabank\FormParamsEncoder;
use Assetku\BankService\Headers\Permatabank\AuthHeader;

class AccessTokenRequest extends BaseRequest implements AccessTokenRequestContract, MustValidated
{
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
