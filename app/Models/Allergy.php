<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $fillable = [
        'patient_id',
        'allergen',
        'reaction',
        'severity'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medicationAlerts()
    {
        return $this->hasMany(MedicationAlert::class);
    }
}
