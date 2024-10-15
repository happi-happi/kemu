<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guardian extends Model
{
    use HasFactory;

    protected $table = 'guardian';

    protected $fillable = [
        'FatherFullName',
        'Fatherfirstphonenumber',
        'Fathersecondphonenumber',
        'FatherOccupation',
        'Fatheremail',
        'FatherPhysicalAddress',
        'MotherFullName',
        'Motherfirstphonenumber',
        'Mothersecondphonenumber',
        'MotherOccupation',
        'Motheremail',
        'MotherPhysicalAddress',
        'GuardianFullName',
        'Relationtostudent',
        'Guardianfirstphonenumber',
        'Guardiansecondphonenumber',
        'password',
    ];
}
