<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientPortal extends Model
{
    protected $fillable = [
        'patient_id',
        'active',
        'last_login'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
