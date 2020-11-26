<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => "required",
            'email'=> "required",
            'password'=>"required",
            'phone'=> "required",
            'genero'=> "required",
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];

}
