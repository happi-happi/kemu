<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standard_five extends Model
{

   use HasFactory;

    protected $table = 'standard_five';

    protected $fillable = [
        'Fname',
        'Mname',
        'Lname',
        'Arabic',
        'CivicsandMorals',
        'English',
        'EDK',
        'Mathematics',
        'Science',
        'Socialsstudies',
        'Kiswahili',

    ];
}


