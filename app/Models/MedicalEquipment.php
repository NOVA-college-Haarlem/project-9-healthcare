<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalEquipment extends Model
{
    protected $fillable = [
        'name',
        'type',
        'serial_number',
        'purchase_date',
        'last_maintenance',
        'next_maintenance',
        'status',
        'location'
    ];

    public function reservations()
    {
        return $this->hasMany(EquipmentReservation::class);
    }
}
