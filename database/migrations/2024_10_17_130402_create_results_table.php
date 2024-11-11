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
            $table->id('results_id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            //$table->foreignId('id')->constrained('users');
            $table->unsignedBigInteger('subjects_id');
            $table->foreign('subjects_id')->references('id')->on('subjects');

            //$table->foreignId('id')->constrained('subjects');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff');

            //$table->foreignId('id')->constrained('staff');
            $table->unsignedBigInteger('schoolinformation_id');
            $table->foreign('schoolinformation_id')->references('id')->on('schoolinformation');

            //$table->foreignId('id')->constrained('schoolinformaion'); // Reference to the school
            $table->enum('term', ['first_midterm', 'semi_annual', 'second_midterm', 'annual']); // Term type
            $table->year('academic_year'); // Academic year (e.g., 2024)
            $table->integer('score');
            $table->timestamps();
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
