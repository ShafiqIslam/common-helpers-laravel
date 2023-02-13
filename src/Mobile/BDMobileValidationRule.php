<?php

namespace Polygontech\CommonHelpers\Mobile;

use Illuminate\Contracts\Validation\Rule;

class BDMobileValidationRule implements Rule
{
    private array $countryCodes = [
        'bd' => 'Bangladeshi'
    ];

    public function __construct(private readonly string $countryCode = 'bd')
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $method = 'validate' . $this->countryCodes[$this->countryCode];
        return $this->$method($value);
    }

    public function message(): string
    {
        return 'The mobile number is invalid.';
    }

    public function validateBangladeshi($value): bool
    {
        return BDMobileValidator::validate($value);
    }
}
