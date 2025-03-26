<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyNotification extends Model
{
    protected $fillable = [
        'sender_id',
        'type',
        'message',
        'target_department',
        'sent_at'
    ];

    public function sender()
    {
        return $this->belongsTo(Administrator::class, 'sender_id');
    }

    public function recipients()
    {
        return $this->belongsToMany(Staff::class, 'emergency_notification_recipients')
                    ->withPivot('read', 'read_at')
                    ->withTimestamps();
    }
}
