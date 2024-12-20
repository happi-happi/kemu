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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('staffFname');
            $table->string('staffMname');
            $table->string('staffLname');
            $table->string('staffDateofBirth');
            $table->string('staffPlaceofBirth');
            $table->string('staffNationality');
            $table->string('staffRegion');
            $table->string('staffDistrict');
            $table->string('staffCurrentresidence');
            $table->string('staffPreviousSchool');
            $table->string('staffnameofschool');
            $table->string('email');
            $table->string('class');
            $table->string('staffRole');
            $table->string('Password');         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }

    public function schoolinformation()
{
    return $this->belongsTo(App\Models\Schoolinformation::class, 'school_id');
}

};
