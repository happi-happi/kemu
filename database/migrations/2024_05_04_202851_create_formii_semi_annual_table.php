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
        Schema::create('formii_semi_annual', function (Blueprint $table) {
            $table->id('formii_semi_annual_id');
            $table->unsignedBigInteger('id');
            $table->String('Fname');
            $table->String('Mname');
            $table->String('Lname');
            $table->integer('Arabiclanguage');
            $table->integer('Basicmathematics');
            $table->integer('Bibleknowledge');
            $table->integer('Bookkeeping');
            $table->integer('Biology');
            $table->integer('Civics');
            $table->integer('Chemistry');
            $table->integer('Computerstudy');
            $table->integer('Creativearts');
            $table->integer('Commerce');
            $table->integer('Englishliterature');
            $table->integer('French');
            $table->integer('Geography');
            $table->integer('History');
            $table->integer('Islamicknowledge');
            $table->integer('Kiswahili');
            $table->integer('Lifeskill');
            $table->integer('Physics');
            $table->integer('Swimming');
            $table->integer('Nutrition');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formii_semi_annual');
    }
};
