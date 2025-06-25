<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $guarded = [];

    public function courseWeeks()
{
    return $this->hasMany(CourseWeek::class);
}
    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function courseLevel()
    {
        return $this->belongsTo(CourseLevel::class);
    }

    public function courseLessons()
    {
        return $this->hasMany(CourseLesson::class);
    }

    public function trainers()
    {
        return $this->belongsToMany(User::class, 'course_trainers', 'course_id', 'trainer_id');
    }

    public function trainees()
    {
        return $this->belongsToMany(User::class, 'course_trainees', 'course_id', 'trainee_id');
    }
}
