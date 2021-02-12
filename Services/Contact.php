<?php

namespace Api\Services;

use Api\Validators\ContactValidator;
use Api\Repositories\Contact;

class ContactService extends Service
{
    public function post($data)
    {
        $validator = new ContactValidator();

        if ($validator->validate($data) === false)
        {
            return $this->error($validator->errors, 200);
        }

        $contactModel = array(
            'name' => trim($data['name']),
            'email' => trim($data['email']),
            'phone' => trim($data['phone']),
            'message' => trim($data['message'])
        );

        try
        {
            $contact = Contact::create($contactModel);

            $to = $this->settings;

            $emailService = $this->container->get('EmailService');

            $message = str_replace("\n", "<br>", $contact->message);
            $data = date("d/m/Y") . ' &agrave;s ' . date("H:i");

            $body = "<b>Nome:</b> {$contact->name}<br>
                     <b>E-mail:</b> {$contact->email}<br>
                     <b>Telefone:</b> {$contact->phone}<br>
                     <b>Mensagem:</b> <br><br>{$message}<br><br><hr>
                     <i>Mensagem enviada via Fale Conosco do site Avalyst em $data</i>";

            if ($emailService->send($contact->email, $contact->name, $to, '', 'Fale Conosco', $body))
            {
                $this->logger->info('E-mail de contato enviado para '. implode(', ', $to));

                return $this->ok();
            }
        }
        catch (\Exception $e)
        {
            $this->logger->error('Erro ao cadastrar o contato', array($e));
        }

        if (empty($contact))
        {
            $msg = "Ocorreu um erro ao enviar a mensagem";

            $this->logger->warning($msg);

            return $this->error($msg);
        }

        return $this->ok();
    }
    
    public function getList($data)
    {
        $contacts = Contact::orderBy('contactId', 'DESC')->get()->toArray();
        
        return $this->ok([ 'data' => $contacts ]);
    }
}

