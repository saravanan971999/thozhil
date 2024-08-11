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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('employer_id')->on('employer');
            $table->string('title',100);
            $table->text('description');
            $table->string('duration',100);
            $table->string('level',30);
            $table->string('language',30);
            $table->string('sample_video');
            $table->string('price',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
