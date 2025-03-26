<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'specialist_id',
        'referral_date',
        'reason',
        'status'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}
