<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsReport extends Model
{
    protected $fillable = [
        'creator_id',
        'report_type',
        'data',
        'report_date'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function creator()
    {
        return $this->belongsTo(Administrator::class, 'creator_id');
    }

    public function reviews()
    {
        return $this->hasMany(AnalyticsReportReview::class, 'report_id');
    }
}
