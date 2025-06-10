<?php

namespace Database\Factories;

use App\Models\CourseWeek;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseWeekFactory extends Factory
{
    protected $model = CourseWeek::class;

    public function definition()
    {
        return [
            'course_id' => Course::factory(),
            'title' => $this->faker->sentence(4),
            'order' => $this->faker->numberBetween(1, 12),
            'description' => $this->faker->optional()->paragraph,
        ];
    }
}
