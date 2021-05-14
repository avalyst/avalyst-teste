<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    const CREATED_AT = 'dateCreated';
    const UPDATED_AT = 'dateUpdated';
}