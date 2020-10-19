<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserDetail;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function user_details(){
        return $this->belongsTo(UserDetail::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
