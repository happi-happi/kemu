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
        Schema::create('student_payment_fee', function (Blueprint $table) {
            $table->id('student_payment_fee_id');
            $table->unsignedBigInteger('id');
            $table->integer('TotalFeeAmount');
            $table->integer('AmountPaid');
            $table->integer('AmountNotPaid');
            $table->String('Status');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_payment_fee');
    }
};
