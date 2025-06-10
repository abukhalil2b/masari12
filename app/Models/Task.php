<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function assignedFor(){
        return $this->belongsTo(User::class,'assigned_for');
    }

    public function assignedBy(){
        return $this->belongsTo(User::class,'assigned_by');
    }
}
