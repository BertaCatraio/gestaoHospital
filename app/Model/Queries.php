<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Patient;
use App\Model\Doctor;
use App\Model\QueriesType;

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


    // Relacionamento com Paciente
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId');
    }


    // Relacionamento com Médico
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorId');
    }


    // Relacionamento com Tipo de Consulta
    public function queriesType()
    {
        return $this->belongsTo(QueriesType::class, 'queriestypeId');
    }
}
