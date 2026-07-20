<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'patientId',
         'doctorId',
         'examTypeId',
         'exam_date',
         'result',
         'status'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorId');
    }

    public function examType()
    {
        return $this->belongsTo(ExamType::class, 'examTypeId');
    }
}
