<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use app\Model\Doctor;
use app\Model\patient;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model

{
    use SoftDeletes;

      protected $fillable =
    [
        'name',
        'specialty',
        'phone',
        'biography',
        'address',
        'age',
        'experience',
        'education',
        'email'
    ];
    public function patients(){
        return $this->hasMany(patient::class);
    }
}
