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
        Schema::create('internships', function (Blueprint $table) {
            $table->id('internship_id');
            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('employer_id')->on('employer');
            $table->string('internship_title',100);
            $table->text('description');
            $table->string('eligiblity_criteria');
            $table->string('required_skills');
            $table->string('duration',100);
            $table->date('application_start_date');
            $table->date('application_deadline');
            $table->string('stipend',100);
            $table->integer('total_vacancies');
            $table->string('accomodation');
            $table->string('application_procedure');
            $table->string('selection_process');
            $table->string('contact_email',150);
            $table->string('contact_number',10);
            $table->string('training_location',100);
            $table->string('address');
            $table->string('location_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
