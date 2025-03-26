<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'prescription_id',
        'name',
        'dosage',
        'frequency',
        'duration',
        'refills'
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
