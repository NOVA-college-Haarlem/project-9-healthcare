<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsReportReview extends Model
{
    protected $fillable = [
        'report_id',
        'officer_id',
        'feedback',
        'review_date'
    ];

    public function report()
    {
        return $this->belongsTo(AnalyticsReport::class);
    }

    public function officer()
    {
        return $this->belongsTo(QualityImprovementOfficer::class, 'officer_id');
    }
}
