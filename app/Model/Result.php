<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [

        'patientId',
        'doctorId',
        'queriesId',

        'examtype',
        'result',
        'diagnostc',
        'observation',
        'data_exame',
        'data_resultado',
        'estado'
    ];
}
