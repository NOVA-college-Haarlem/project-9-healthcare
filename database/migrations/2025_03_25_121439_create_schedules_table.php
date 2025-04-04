<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            
            //declaring twice to make them nullable
            $table->foreignId('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        
            $table->foreignId('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        
            $table->date('date');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            
            $table->timestamps();
            $table->softDeletes(); 
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
