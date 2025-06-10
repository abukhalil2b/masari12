<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseTraineeSeeder extends Seeder
{
    public function run()
    {
        $trainees = User::where('profile_using', 'trainee')->get();
        $courses = Course::all();

        foreach ($courses as $course) {
            $assignedTrainees = $trainees->random(rand(5, 15));
            foreach ($assignedTrainees as $trainee) {
                $course->trainees()->attach($trainee->id, [
                    'status' => fake()->randomElement(['pending_approval', 'enrolled', 'graduated', 'failed', 'withdrawn'])
                ]);
            }
        }
    }
}
