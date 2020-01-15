<?php

namespace Assetku\BankService\utils;

use Assetku\BankService\Exceptions\BankValidatorException;
use Assetku\BankService\Rules\Rule;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Validation\ValidationException;

class Validator
{
    /**
     * Validate the given data with the given rule.
     *
     * @param  array  $data
     * @param  Rule  $rule
     * @throws BankValidatorException
     */
    public function validate(array $data, Rule $rule)
    {
        try {
            app(Factory::class)
                ->make($data, $rule->rules(), $rule->messages(), $rule->customAttributes())
                ->validate();
        } catch (ValidationException $e) {
            throw BankValidatorException::failed($e->getMessage(), $e->errors());
        }
    }
}
