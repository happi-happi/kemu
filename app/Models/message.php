<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    protected $table = 'message';

    protected $fillable =[
          
        'id',
        'Subject',
        'Department',
        'Message',
        'file_path',

    ];

    public function user(){

        return $this->belongsTo(User::class, 'id');
    }
}
