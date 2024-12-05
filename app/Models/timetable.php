<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetable';

    protected $fillable = [
        
        'schoolinformation_id', 'subject_id', 'staff_id', 'class_name', 'day', 'start_time', 'end_time'
    ];

  

    public function subject()
    {
        return $this->belongsTo(subjects::class);
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id');
    }

    public function schoolinformation()
    {
        return $this->belongsTo(schoolinformation::class, 'schoolinformation_id');
    }
    
}
