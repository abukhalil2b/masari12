<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function sender(){
        return $this->belongsTo(User::class);
    }

    public function receivers(){
        
    }

    public function replays(){
    }

    public function ownMessage($owner){
        return $this->sender_id == $owner->id;
    }
}
