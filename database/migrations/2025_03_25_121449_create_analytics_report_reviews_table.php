<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('analytics_report_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('analytics_reports');
            $table->foreignId('officer_id')->constrained('quality_improvement_officers');
            $table->text('feedback')->nullable();
            $table->date('review_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('analytics_report_reviews');
    }
};
