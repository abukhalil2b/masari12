<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $guarded = [];

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function courseLevel()
    {
        return $this->belongsTo(CourseLevel::class);
    }

    public function courseLessons()
    {
        return $this->hasMany(CourseLesson::class);
    }

    public function courseTrainers()
    {
        return $this->belongsToMany(User::class, 'course_trainers', 'course_id', 'trainer_id');
    }

    public function courseTrainees()
    {
        return $this->belongsToMany(User::class, 'course_trainees', 'course_id', 'trainee_id');
    }
}
