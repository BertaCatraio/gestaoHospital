<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'gender',
        'address',
        'age',
        'doctor_id',
        'companion_name',
        'companion_phone',
        'registration_date'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
