<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyNotificationRecipient extends Model
{
    protected $table = 'emergency_notification_recipients';

    protected $fillable = [
        'notification_id',
        'staff_id',
        'read',
        'read_at'
    ];

    public function notification()
    {
        return $this->belongsTo(EmergencyNotification::class, 'notification_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
