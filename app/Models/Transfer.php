<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Transaction;
use App\Models\PaymentMethods;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sender_method',
        'receiver_method',
        'sender_method_id',
        'receiver_method_id',
        'reference'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function sender_payment_method()
    {
        return $this->belongsTo(PaymentMethods::class, 'sender_method_id');
    }

    public function receiver_payment_method()
    {
        return $this->belongsTo(PaymentMethods::class, 'receiver_method_id');
    }
}
