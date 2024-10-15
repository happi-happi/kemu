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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('SchoolName')->nullable();
            $table->string('DateofBirth')->nullable();
            $table->string('PlaceofBirth')->nullable();
            $table->string('Nationality')->nullable();
            $table->string('Region')->nullable();
            $table->string('District')->nullable();
            $table->string('Currentresidence')->nullable();
            $table->string('PreviousSchool')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
