<?php

namespace App\Models;

use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
