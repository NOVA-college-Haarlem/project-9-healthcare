<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthMetric extends Model
{
    protected $fillable = [
        'patient_id',
        'metric_type',
        'value',
        'unit',
        'recorded_at',
        'notes'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
