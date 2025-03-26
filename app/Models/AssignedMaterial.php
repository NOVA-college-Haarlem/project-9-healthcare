<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedMaterial extends Model
{
    protected $table = 'assigned_materials';

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'material_id',
        'assigned_date',
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

    public function material()
    {
        return $this->belongsTo(EducationalMaterial::class, 'material_id');
    }
}
