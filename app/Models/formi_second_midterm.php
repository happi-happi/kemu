<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formi_second_midterm extends Model
{
    use HasFactory;

    protected $table = 'formi_second_midterm';

    protected $fillable = [
        'id',
        'Fname',
        'Mname',
        'Lname',
        'Arabiclanguage',
        'Basicmathematics',
        'Bibleknowledge',
        'Bookkeeping',
        'Biology',
        'Civics',
        'Chemistry',
        'Computerstudy',
        'Creativearts',
        'Commerce',
        'Englishliterature',
        'French',
        'Geography',
        'History',
        'Islamicknowledge',
        'Kiswahili',
        'Lifeskill',
        'Physics',
        'Swimming',
        'Nutrition',

    ];

    public function user(){

        return $this->belongsTo(User::class, 'id');
    }
}
