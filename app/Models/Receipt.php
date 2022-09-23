<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Provider;
use App\Models\ReceivedProduct;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'provider_id',
        'user_id'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(ReceivedProduct::class);
    }
}
