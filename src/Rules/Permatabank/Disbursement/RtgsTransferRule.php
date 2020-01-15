<?php

namespace Assetku\BankService\Rules\Permatabank\Disbursement;

use Assetku\BankService\Rules\Rule;

class RtgsTransferRule extends Rule
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'amount' => 'required|numeric|min:100000000',
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
