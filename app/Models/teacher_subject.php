<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
    'staff_id',
    'subjects_id',

    ];

    public function staff()
    {
        return $this->belongsTo(staff::class, 'teacher_id', 'id');
    }

    // Relationship with the Subject model
    public function subjects()
    {
        return $this->belongsTo(subjects::class, 'subjects_id', 'id');
    }
}
