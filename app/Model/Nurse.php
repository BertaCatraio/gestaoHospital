<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $fillable = [
        'name',
        'specialty',
        'phone',
        'address',
        'email',
        'education',
        'age',
        'gender'

    ];
}
