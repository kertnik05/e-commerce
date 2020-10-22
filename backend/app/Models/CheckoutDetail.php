<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Checkout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckoutDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function getPriceAttribute($value) 
    {
        return $value / 100;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }
}
