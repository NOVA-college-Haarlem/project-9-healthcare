<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'date_of_birth',
        'gender',
        'address',
        'phone',
        'emergency_contact',
        'blood_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function insurance()
    {
        return $this->hasOne(Insurance::class);
    }

    public function labResults()
    {
        return $this->hasMany(LabResult::class);
    }
    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
}
