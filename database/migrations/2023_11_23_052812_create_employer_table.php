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
        Schema::create('employer', function (Blueprint $table) {
            $table->id('employer_id');
            $table->string('first_name',60);
            $table->string('last_name',60);
            $table->string('email_id',150);
            $table->string('password',60);
            $table->biginteger('phone');
            $table->date('dob');
            $table->integer('age');
            $table->string('gender',50);
            $table->string('organization_name',200);
            $table->text('description');
            $table->string('logo');
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer');
    }
};
