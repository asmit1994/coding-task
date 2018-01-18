<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'email',
        'address',
        'nationality',
        'date_of_birth',
        'education',
        'preferred_contact'
    ];
}
