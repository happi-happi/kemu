<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'name',

    ];


    public function teachers()
    {
        return $this->belongsToMany(staff::class, 'teacher_subject');
    }

    public function results()
    {
        return $this->hasMany(result::class, 'subjects_id');
    }

    public function teacher_subject()
    {
        return $this->hasMany(teacher_subject::class, 'subjects_id', 'id');
    }

    // Relationship with Staff model through teacher_subject
    public function staff()
    {
        return $this->belongsToMany(staff::class, 'teacher_subject', 'subjects_id', 'staff_id');
    }

    // Relationship with users (students)
    public function subjects()
    {
        return $this->hasMany(User::class, 'subjects_id', 'id');
    }
}
