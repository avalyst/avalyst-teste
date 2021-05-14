<?php

namespace Api\Validators;

use Respect\Validation\Validator as v;

final class ContactValidator extends SelfValidation
{
    public function validate($data)
    {
        $rules = [
            'name' => v::notEmpty()->length(0,100)->setName('Nome'),
            'email' => v::email()->notEmpty()->length(0,100)->setName('E-mail'),
        ];

        return $this->validateData($data, $rules);
    }
}
