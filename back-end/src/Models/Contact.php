<?php

namespace Api\Models;

final class Contact extends BaseModel
{
    protected $primaryKey = 'contactId';
    protected $table = 'contact';

    protected $fillable = [
        'name', 
        'email', 
        'message'
    ];
}
