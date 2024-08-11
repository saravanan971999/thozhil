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
        Schema::create('student', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('first_name',60);
            $table->string('last_name',60);
            $table->string('email_id',150);
            $table->string('password',60);
            $table->biginteger('phone');
            $table->date('dob');
            $table->integer('age');
            $table->string('gender',50);
            $table->string('door_no',50);
            $table->string('street_name',80);
            $table->string('locality',50);
            $table->string('city',50);
            $table->string('distict',50);
            $table->string('state',50);
            $table->string('country',50);
            $table->integer('pincode');
            $table->string('qualification',80);
            $table->string('degree',80);
            $table->string('major_subject',100);
            $table->integer('graduating_year');
            $table->integer('passed_out_year');
            $table->string('college_name',150);
            $table->string('college_state',100);
            $table->string('college_district',100);
            $table->string('resume',150);
            $table->string('username',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
