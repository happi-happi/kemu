<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    use HasFactory;

    protected $table = 'results';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'users_id', 
        'subjects_id', 
        'staff_id', 
        'schoolinformation_id', 
        'term', 
        'academic_year', 
        'score'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id' );
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id');
    }

    public function subject()
{
    return $this->belongsTo(subjects::class, 'subjects_id');
}

    public function schoolinformation()
    {
        return $this->belongsTo(schoolinformation::class, 'schoolinformation_id');
    }
}
