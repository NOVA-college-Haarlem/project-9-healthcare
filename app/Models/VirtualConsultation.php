<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualConsultation extends Model
{
    protected $fillable = [
        'appointment_id',
        'meeting_link',
        'start_time',
        'end_time',
        'notes'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
