<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->optional()->paragraph,
            'passing_score_percentage' => $this->faker->optional()->numberBetween(50, 100),
            'time_limit_minutes' => $this->faker->optional()->numberBetween(10, 90),
        ];
    }
}
