<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_has_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('day_id')->constrained('attendance_dates');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('user_has_attendances');
    }
};
