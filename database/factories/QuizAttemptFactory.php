<?php

namespace Database\Factories;
use App\Models\QuizAttempt;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizAttemptFactory extends Factory
{
    protected $model = QuizAttempt::class;

    public function definition()
    {
        return [
            'trainee_id' => 3,
            'quiz_id' => Quiz::factory(),
            'started_at' => now(),
            'completed_at' => $this->faker->optional()->dateTimeBetween('+10 minutes', '+1 hour'),
            'score' => $this->faker->optional()->numberBetween(0, 100),
            'attempt_number' => 1,
        ];
    }
}
