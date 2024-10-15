<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'staffFname',
        'staffMname',
        'staffLname',
        'staffDateofBirth',
        'staffPlaceofBirth',
        'staffNationality',
        'staffRegion',
        'staffDistrict',
        'staffCurrentresidence',
        'staffPreviousSchool',
        'staffnameofschool',
        'email',
        'class',
        'staffRole',
        'Password',
    ];
}
