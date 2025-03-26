<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'issue_date',
        'expiry_date',
        'notes'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function medicationAlerts()
    {
        return $this->hasMany(MedicationAlert::class);
    }
}
