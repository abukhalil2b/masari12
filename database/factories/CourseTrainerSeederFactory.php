<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseTrainerSeeder extends Seeder
{
    public function run()
    {
        $trainers = User::where('profile_using', 'trainer')->get();
        $courses = Course::all();

        foreach ($courses as $course) {
            $assignedTrainers = $trainers->random(rand(1, 3));
            foreach ($assignedTrainers as $trainer) {
                $course->trainers()->attach($trainer->id);
            }
        }
    }
}
