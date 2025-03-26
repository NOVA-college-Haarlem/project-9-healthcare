<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'scheduled_time',
        'reason',
        'status_id',
        'notes'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function status()
    {
        return $this->belongsTo(AppointmentStatus::class, 'status_id');
    }

    public function virtualConsultation()
    {
        return $this->hasOne(VirtualConsultation::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

    public function checkIn()
    {
        return $this->hasOne(CheckIn::class);
    }
}
