<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\patient;
use App\Model\screening;
class Screening extends Model
{
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
