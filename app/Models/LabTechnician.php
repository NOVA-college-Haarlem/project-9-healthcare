<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabTechnician extends Model
{
    protected $fillable = ['staff_id', 'certification'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function labResults()
    {
        return $this->hasMany(LabResult::class, 'lab_technician_id');
    }
}
