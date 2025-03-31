<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->foreignId('lab_technician_id')->constrained('lab_technicians')->onDelete('cascade');
            $table->string('test_name');
            $table->string('test_category');
            $table->date('test_date');
            $table->string('status')->default('pending');
            $table->text('doctor_notes')->nullable();
            $table->boolean('is_abnormal')->default(false);
            $table->string('result_value')->nullable();
            $table->string('reference_range')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lab_results');
    }
};
