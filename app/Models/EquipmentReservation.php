<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentReservation extends Model
{
    protected $fillable = [
        'staff_id',
        'equipment_id',
        'start_time',
        'end_time',
        'purpose'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function equipment()
    {
        return $this->belongsTo(MedicalEquipment::class);
    }
}
