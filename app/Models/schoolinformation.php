<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoolinformation extends Model
{
    use HasFactory;

    protected $table = 'schoolinformation';

    protected $fillable =[         
        'SchoolName',
        'Country',
        'Region',
        'District',
        'POBOX',
        'Emblem',
        'BankAccount',
        'FirstContact',
        'SecondContact',

    ];
}
