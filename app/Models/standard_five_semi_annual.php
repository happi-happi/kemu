<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standard_five_semi_annual extends Model
{
    use HasFactory;
    
    protected $table = 'standard_five_semi_annual';

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
