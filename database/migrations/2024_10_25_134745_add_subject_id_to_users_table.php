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
          
                // Add the `subject_id` column as an unsigned integer
                $table->unsignedBigInteger('subject_id')->nullable(); // Place it after a specific column or just add it
                
                // Add a foreign key constraint to the `subjects` table
                $table->foreign('subject_id')->references('id')->on('subjects')
                      ->onUpdate('cascade')
                      ->onDelete('set null'); // Handle what should happen if the related subject is deleted
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            Schema::table('users', function (Blueprint $table) {
                // Drop the foreign key constraint and column
                $table->dropForeign(['subject_id']);
                $table->dropColumn('subject_id');
            });
        });
    }
};
