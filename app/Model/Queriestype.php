<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Queries_type extends Model
{
    use SoftDeletes();

    protected $fillable =

     [
        'follow_up_consultation',
        'general_consultation',
        'routine_consultation',
        'cardiology',
        'pediatrecs',
        'obstetrecs',
        'cardiology',
        'orthopidics',
        'dermatology',
        'psychiatry',
        'ophthalmology',
        'neurology',
        'emergency',
    ];
}
