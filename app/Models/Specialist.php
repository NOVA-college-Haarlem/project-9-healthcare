<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $fillable = [
        'doctor_id',
        'specialty',
        'certification'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'specialist_id');
    }
}
