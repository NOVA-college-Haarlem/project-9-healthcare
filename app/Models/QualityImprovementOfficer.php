<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityImprovementOfficer extends Model
{
    protected $fillable = ['staff_id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function reportReviews()
    {
        return $this->hasMany(AnalyticsReportReview::class, 'officer_id');
    }
}
