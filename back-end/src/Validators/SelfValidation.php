<?php

namespace Api\Validators;

abstract class SelfValidation
{
    public $errors = [];

    protected function validateData($data, $rules)
    {
        foreach ($rules as $key => $validator)
        {
            try
            {
                if (is_array($validator))
                {
                    $valid = false;
                    $keyNames = array();

                    foreach ($validator as $oneOfKey => $oneOfValidator)
                    {
                        $keyNames[] = $oneOfValidator->getName();
                        $valid = $valid || (isset($data[$oneOfKey]) && $oneOfValidator->validate($data[$oneOfKey]));
                    }

                    if (!$valid)
                    {
                        $this->errors[] = 'Informe ' . implode(' ou ', $keyNames);
                    }
                }
                else if (isset($data[$key]))
                {
                    $validator->check($data[$key]);
                }
                else
                {
                    $this->errors[] = $validator->getName() . ' é obrigatório';
                }
            }
            catch (\Respect\Validation\Exceptions\ValidationException $exception)
            {
                if (substr(get_class($exception), 0, 3) != 'Api')
                {
                    $exception->setParam('translator', function($message)
                    {
                        $messages = [
                            'All of the required rules must pass for {{name}}' => '',
                            'These rules must pass for {{name}}' => '',
                            'Attribute {{name}} must be present' => '{{name}} é obrigatório',
                            'Attribute {{name}} must be valid' => '{{name}} é obrigatório',
                            'Key {{name}} must be present' => '{{name}} é obrigatório',
                            '{{name}} must be a valid date' => '{{name}} inválida',
                            '{{name}} must not be empty' => '{{name}} é obrigatório',
                            '{{name}} must be a string' => '{{name}} é obrigatório',
                            '{{name}} must be valid email' => 'E-mail {{input}} inválido',
                            '{{name}} must have a length lower than {{maxValue}}' => '{{name}} deve ter no máximo {{maxValue}} caracteres',
                            '{{name}} must have a length greater than {{minValue}}' => '{{name}} deve ter no mínimo {{minValue}} caracteres',
                            '{{name}} must have a length between {{minValue}} and {{maxValue}}', '{{name}} deve ter entre {{minValue}} e {{maxValue}} caracteres',
                            '{{name}} must be equals {{compareTo}}' => 'Confirme a senha corretamente',
                            '{{name}} must be a boolean value' => '{{name}} é obrigatório',
                            '{{name}} must be a valid CNPJ number' => '{{name}} {{input}} inválido',
                            '{{name}} must be a valid CPF number' => '{{name}} {{input}} inválido',
                            '{{name}} must contain only digits (0-9)' => '{{name}} deve ser um número',
                            '{{name}} must be a subdivision code of Brazil' => 'Estado inválido',
                            '{{name}} must be a valid postal code on {{countryCode}}' => 'CEP {{input}} inválido',
                            '{{name}} must be in {{haystack}}' => '{{name}} deve ser {{haystack}}',
                            '{{name}} must be an integer number' => '{{name}} deve ser um número',
                            '{{name}} must be numeric' => '{{name}} deve ser um número',
                            '{{name}} must be less than or equal to {{interval}}' => '{{name}} deve ser menor ou igual a {{interval}}',
                            '{{name}} must be greater than or equal to {{interval}}' => '{{name}} deve ser maior ou igual a {{interval}}',
                            '{{name}} must be a valid Credit Card number' => '{{name}} inválido',
                            '{{name}} must validate against {{regex}}' => '{{name}} inválido',
                            '{{name}} must be a boolean' => '{{name}} é obrigatório',
                            '{{name}} must have a length between {{minValue}} and {{maxValue}}' => '{{name}} deve ter entre {{minValue}} e {{maxValue}} caracteres',
                            '{{name}} must be positive' => '{{name}} deve ser maior que zero',
                            '{{name}} must be a URL' => '{{name}} inválido',
                            '{{name}} must be an array' => '{{name}} deve ser uma array'
                        ];

                        if (isset($messages[$message]))
                        {
                            return $messages[$message];
                        }
                        else
                        {
                            $this->errors[] = $message;

                            return $message;
                        }
                    });
                }

                $this->errors[] = $exception->getMainMessage();
            }
        }

        return count($this->errors) === 0;
    }
}
