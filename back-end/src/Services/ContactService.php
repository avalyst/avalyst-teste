<?php

namespace Api\Services;

use Api\Validators\ContactValidator;
use Api\Models\Contact;

class ContactService extends BaseService
{
    public function get($id)
    {
        if (empty($id))
        {
            $data = Contact::all()->toArray();
        }
        else
        {
            $data = Contact::find($id)->toArray();
        }

        return $this->ok($data);
    }

    public function post($data)
    {
        $validator = new ContactValidator();

        if ($validator->validate($data) === false)
        {
            return $this->error($validator->errors, 200);
        }

        $contact = Contact::create([            
            'name' => trim($data['name']),
            'email' => trim($data['email']),
        ]);

        return $this->ok($contact->toArray());
    }

    public function put($id, $data)
    {
        $validator = new ContactValidator();

        if ($validator->validate($data) === false)
        {
            return $this->error($validator->errors, 200);
        }

        $contact = Contact::find($id);

        if (!$contact)
        {
            return $this->error('Not found', 404);
        }

        $contact->fill([
            'name' => trim($data['name']),
            'email' => trim($data['email']),
        ]);

        $contact->save();

        return $this->ok($contact->toArray());
    }
}

