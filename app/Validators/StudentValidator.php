<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class StudentValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'course_id' => "required",
            'name'=> "required",
            'registration'=>"required",
            'uf'=> "required",
            'city'=> "required",
            'cep'=> "required",
            'neighborhood'=> "required",
            'street'=> "required",
            'number'=> "required",
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
