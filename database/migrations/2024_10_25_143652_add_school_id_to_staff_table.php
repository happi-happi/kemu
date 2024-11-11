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
        Schema::table('staff', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('school_id')->nullable(); // Place it after a specific column or just add it
                
                // Add a foreign key constraint to the `subjects` table
                $table->foreign('school_id')->references('id')->on('schoolinformation')
                      ->onUpdate('cascade')
                      ->onDelete('set null'); // Handle what should happen if the related subject is deleted
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            //
        });
    }
};
