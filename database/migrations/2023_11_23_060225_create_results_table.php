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
        Schema::create('results', function (Blueprint $table) {
            $table->id('result_id');
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('test_id')->on('tests');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('student');
            $table->string('scored',30);
            $table->string('qualification_mark',30);
            $table->string('status',30);
            $table->datetime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
