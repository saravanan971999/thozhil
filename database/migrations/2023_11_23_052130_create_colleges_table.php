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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id('college_id');
            $table->string('college_name',255);
            $table->string('college_type',255);
            $table->string('country',255);
            $table->string('state_name',255);
            $table->string('district_name',255);
            $table->string('university_name',255);
            $table->string('registration_no',255);
            $table->string('college_code',50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
