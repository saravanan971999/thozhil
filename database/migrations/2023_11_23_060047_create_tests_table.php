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
        Schema::create('tests', function (Blueprint $table) {
            $table->id('test_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('student');
            $table->date('conducted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
