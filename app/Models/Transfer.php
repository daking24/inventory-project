<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function sender_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'sender_method_id');
    }

    public function receiver_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'receiver_method_id');
    }
}
