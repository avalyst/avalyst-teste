<?php

namespace Api\Validators;

use Respect\Validation\Validator as v;

final class ContactValidator extends SelfValidation
{
    public function validate($data)
    {
        $rules = array(
            'name' => v::notEmpty()->length(0,100)->setName('Nome'),
            'email' => v::email()->notEmpty()->length(0,100)->setName('E-mail'),
            'phone' => v::notEmpty()->length(0,15)->setName('Telefone'),
            'message' => v::notEmpty()->setName('Mensagem')
        );

        return $this->validateData($data, $rules);
    }
}
