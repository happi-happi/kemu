<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
    ];

    // Define the relationship with the Sender
    public function sender()
    {
        return $this->belongsTo(staff::class, 'sender_id');
    }

    // Define the relationship with the Receiver
    public function receiver()
    {
        return $this->belongsTo(staff::class, 'receiver_id');
    }
}
