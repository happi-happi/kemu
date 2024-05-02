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
        Schema::create('schoolinformation', function (Blueprint $table) {
            $table->id();
            $table->string('SchoolName');
            $table->string('Country');
            $table->string('Region');
            $table->string('District');
            $table->integer('POBOX');
            $table->string('Emblem');
            $table->string('BankAccount');
            $table->integer('FirstContact');
            $table->integer('SecondContact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolinformation');
    }
};
