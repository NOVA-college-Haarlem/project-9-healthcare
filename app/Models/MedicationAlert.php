<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicationAlert extends Model
{
    protected $fillable = [
        'doctor_id',
        'prescription_id',
        'allergy_id',
        'alert_type',
        'message',
        'acknowledged'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    public function allergy()
    {
        return $this->belongsTo(Allergy::class);
    }
}
