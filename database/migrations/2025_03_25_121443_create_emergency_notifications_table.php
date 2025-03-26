<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('emergency_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('administrators');
            $table->string('type');
            $table->text('message');
            $table->string('target_department')->nullable();
            $table->dateTime('sent_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emergency_notifications');
    }
};
