<?php

namespace Database\Factories;
use App\Models\TraineeAnswer;
use App\Models\QuizAttempt;
use App\Models\Question;
use App\Models\QuestionChoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class TraineeAnswerFactory extends Factory
{
    protected $model = TraineeAnswer::class;

    public function definition()
    {
        return [
            'quiz_attempt_id' => QuizAttempt::factory(),
            'question_id' => Question::factory(),
            'selected_choice_id' => $this->faker->optional()->randomElement(QuestionChoice::pluck('id')->toArray()),
            'text_answer' => $this->faker->optional()->sentence(3),
            'is_correct' => $this->faker->optional()->boolean,
        ];
    }
}
