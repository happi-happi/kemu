<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standard_five_annual extends Model
{
    use HasFactory;

    protected $table = 'standard_five_annual';

    protected $fillable = [
        'id',
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

    public function user(){

        return $this->belongsTo(User::class, 'id');
    }
}
