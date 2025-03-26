<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'lab_technician_id',
        'test_name',
        'test_date',
        'result',
        'abnormal',
        'interpretation'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function labTechnician()
    {
        return $this->belongsTo(LabTechnician::class);
    }
}
