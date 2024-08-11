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
        Schema::create('applications_tracking', function (Blueprint $table) {
            $table->id('application_id');
            $table->unsignedBigInteger('internship_id');
            $table->foreign('internship_id')->references('internship_id')->on('internships');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('student');
            $table->string('status',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications_tracking');
    }
};
