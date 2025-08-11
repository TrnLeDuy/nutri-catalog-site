<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact__contacts';
    protected $fillable = [
        'code',
        'name',
        'subject',
        'message',
        'reply',
        'phone',
        'email',
        'status',
    ];
}
