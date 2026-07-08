<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Queries extends Model
{
    protected $table = 'queries';

    protected $fillable = [
        'patientId',
        'doctorId',
        'queriestypeId',
        'date',
        'time',
        'status',
        'reason',
        'observation',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function queriestype()
    {
        return $this->belongsTo(Queriestype::class, 'queriestypeId');
    }
}
