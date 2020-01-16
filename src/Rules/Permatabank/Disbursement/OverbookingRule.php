<?php

namespace Assetku\BankService\Rules\Permatabank\Disbursement;

class OverbookingRule
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:1000',
        ];
    }

    /**
     * Get custom attributes for validation
     *
     * @return array
     */
    public function customAttributes()
    {
        return [
            'amount' => 'jumlah',
        ];
    }
}
