<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MessageReplay extends Model
{
    use HasFactory;

    public $table = 'message_replies';
    
    protected $guarded = [];

}
