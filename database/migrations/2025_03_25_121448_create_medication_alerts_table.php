<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('medication_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained();
            $table->foreignId('prescription_id')->nullable()->constrained();
            $table->foreignId('allergy_id')->nullable()->constrained();
            $table->string('alert_type');
            $table->text('message');
            $table->boolean('acknowledged')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medication_alerts');
    }
};
