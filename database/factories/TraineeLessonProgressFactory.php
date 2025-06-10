<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TraineeLessonProgress>
 */
class TraineeLessonProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trainee_id' => 3,
            'course_lesson_id' => \App\Models\CourseLesson::factory(),
            'status' => $this->faker->randomElement(['not_started', 'in_progress', 'completed', 'skipped']),
            'completed_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
