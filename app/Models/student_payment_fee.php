<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_payment_fee extends Model
{
    use HasFactory;
    protected $table = 'student_payment_fee';

    protected $fillable = [
        'id',
        'TotalFeeAmount',
        'AmountPaid',
        'AmountNotPaid',
        'Status',
        'OverPayment',
         

    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
