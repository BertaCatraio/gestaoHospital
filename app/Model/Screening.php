<?php

namespace App\Model;
use\app\Model\screening;
use\app\Model\patient;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Screening extends Model
{
    use SoftDeletes;

     protected $fillable =
    [
       'temperature',
       'weight',
       'heartbeat',
       'blood_pressure',
       'observation',

    ];

    public function patient() {
     return $this->belongsTo(Patient::class);
    }
}
