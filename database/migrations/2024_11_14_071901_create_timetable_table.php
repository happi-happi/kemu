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
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('schoolinformation_id');
            $table->foreign('schoolinformation_id')->references('id')->on('schoolinformation');

            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff');
         
            $table->string('class_name');
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable');
    }
};
