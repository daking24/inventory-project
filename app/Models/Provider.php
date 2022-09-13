<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'email', 
        'phone', 
        'paymentinfo'
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
