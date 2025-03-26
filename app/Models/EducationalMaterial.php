<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalMaterial extends Model
{
    protected $fillable = [
        'title',
        'content_type',
        'file_path',
        'description'
    ];

    public function assignedPatients()
    {
        return $this->belongsToMany(Patient::class, 'assigned_materials')
                    ->withPivot('doctor_id', 'assigned_date', 'notes')
                    ->withTimestamps();
    }
}
