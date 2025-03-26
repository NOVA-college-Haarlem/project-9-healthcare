<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{

    protected $fillable = [
        'patient_id',
        'provider',
        'policy_number',
        'start_date',
        'end_date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
