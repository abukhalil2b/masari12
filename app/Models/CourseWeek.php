<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseWeek extends Model
{
   protected $guarded = [];
   public function courseLessons()
   {
      return $this->hasMany(CourseLesson::class)->orderBy('order');
   }
}
