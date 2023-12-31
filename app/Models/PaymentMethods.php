<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Transaction;

class PaymentMethods extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class, 'payment_methods_id', 'id');
    }
}
