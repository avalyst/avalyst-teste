<?php

namespace Api\Repositories;

final class Contact extends BaseModel
{
    protected $primaryKey = 'contactId';
    protected $table = 'contact';

    const CREATED_AT = 'date';
    const UPDATED_AT = null;

    /**
     * Fields that can be updated via update()
     * @var array
     */
    protected $fillable = [
        'userId', 'name', 'email', 'phone', 'message'
    ];
}
