<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
       // return ['required', 'string', new Password, 'confirmed'];
        return (new Password)->length(5)->requireSpecialCharacter()->requireNumeric()->requireUppercase();

    }
}
