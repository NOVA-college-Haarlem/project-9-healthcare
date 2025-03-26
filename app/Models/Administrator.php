<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $fillable = ['staff_id', 'access_level'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function emergencyNotifications()
    {
        return $this->hasMany(EmergencyNotification::class, 'sender_id');
    }

    public function analyticsReports()
    {
        return $this->hasMany(AnalyticsReport::class, 'creator_id');
    }
}
