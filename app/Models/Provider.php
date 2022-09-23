<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Transaction;
use App\Models\Receipt;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'paymentInfo'
       ];

       public function transactions()
       {
           return $this->hasMany(Transaction::class);
       }

       public function receipts()
       {
           return $this->hasMany(Receipt::class);
       }
}
