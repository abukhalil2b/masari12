<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $guarded = [];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class,'profile_permission','permission_id','profile_id');
    }
}
