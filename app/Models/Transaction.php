<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PaymentMethods;
use App\Models\Provider;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Transfer;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'reference',
        'amount',
        'payment_methods_id',
        'type',
        'client_id',
        'user_id',
        'sale_id',
        'provider_id',
        'transfer_id'
    ];

    public function method()
    {
        return $this->belongsTo(PaymentMethods::class, 'payment_methods_id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function transfer()
    {
        return $this->belongsTo(Transfer::class);
    }

    public function scopeFindByPaymentMethodId($query, $id)
    {
        return $query->where('payment_methods_id', $id);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', Carbon::now()->month);
    }
}
