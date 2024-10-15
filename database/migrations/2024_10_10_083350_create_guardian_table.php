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
        Schema::create('guardian', function (Blueprint $table) {
            $table->id();
            $table->string('FatherFullName');
            $table->string('Fatherfirstphonenumber');
            $table->string('Fathersecondphonenumber');
            $table->string('FatherOccupation');
            $table->string('Fatheremail');
            $table->string('FatherPhysicalAddress');
            $table->string('MotherFullName');
            $table->string('Motherfirstphonenumber');
            $table->string('Mothersecondphonenumber');
            $table->string('MotherOccupation');
            $table->string('Motheremail');
            $table->string('GuardianFullName');
            $table->string('Relationtostudent');
            $table->string('Guardianfirstphonenumber');
            $table->string('Guardiansecondphonenumber');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardian');
    }
};
