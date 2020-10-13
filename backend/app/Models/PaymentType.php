<?php

namespace App\Models;

use App\Models\Checkout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }
}
