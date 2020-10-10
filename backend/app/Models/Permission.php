<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;

class Permission extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];

    public function roles(){
        return $this->belongsToMany(Role::class, 'permission_roles')->withTimestamps();
    }
}
