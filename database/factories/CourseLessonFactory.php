<?php

namespace Database\Factories;

use App\Models\CourseLesson;
use App\Models\Course;
use App\Models\CourseWeek;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseLessonFactory extends Factory
{
    protected $model = CourseLesson::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'course_id' => 1,
            'course_week_id' => $this->faker->optional()->randomElement(CourseWeek::pluck('id')->toArray()),
            'order' => $this->faker->numberBetween(1, 20),
            'type' => $this->faker->randomElement(['video', 'live', 'file', 'text', 'quiz']),
            'content' => $this->faker->optional()->paragraph,
            'url' => $this->faker->optional()->url,
            'quiz_id' => $this->faker->optional()->randomElement(Quiz::pluck('id')->toArray()),
        ];
    }
}
