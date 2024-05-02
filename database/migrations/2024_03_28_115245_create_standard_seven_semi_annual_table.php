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
        Schema::create('standard_seven_semi_annual', function (Blueprint $table) {
            $table->id('standard_seven_semi_annual_id');
            $table->unsignedBigInteger('id');
            $table->String('Fname');
            $table->String('Mname');
            $table->String('Lname');
            $table->integer('Arabic');
            $table->integer('CivicsandMorals');
            $table->integer('English');
            $table->integer('EDK');
            $table->integer('Mathematics');
            $table->integer('Science');
            $table->integer('Socialsstudies');
            $table->integer('Kiswahili');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standard_seven_semi_annual');
    }
};
