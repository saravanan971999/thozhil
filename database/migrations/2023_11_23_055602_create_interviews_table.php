<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id('interview_id');
            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('employer_id')->on('employer');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('student');
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')->references('application_id')->on('applications_tracking');
            $table->string('mode_of_interview',50);
            $table->date('interview_date');
            $table->time('interview_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
