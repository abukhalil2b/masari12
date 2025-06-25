<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTrainer extends Model
{

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(CourseLevel::class);
    }

}
