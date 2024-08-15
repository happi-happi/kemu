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
            $table->integer('firstphonenumber')->nullable()->before('email');
            $table->integer('secondphonenumber')->nullable()->before('email');
            $table->string('nameofschool')->nullable()->before('Role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['firstphone', 'secondphonenumber', 'nameofschool']);
        });
    }
};
