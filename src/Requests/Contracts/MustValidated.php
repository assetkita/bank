<?php

namespace Assetku\BankService\Requests\Contracts;

interface MustValidated
{
    /**
     * Get request's data for validation
     *
     * @return array
     */
    public function data();

    /**
     * Get request's rules for validation
     *
     * @return array
     */
    public function rules();

    /**
     * Get request's messages for validation
     *
     * @return array
     */
    public function messages();

    /**
     * Get request's custom attributes for validation
     *
     * @return array
     */
    public function customAttributes();
}
