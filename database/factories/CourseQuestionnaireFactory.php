<?php

namespace Database\Factories;

use App\Models\CourseQuestionnaire;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseQuestionnaireFactory extends Factory
{
    protected $model = CourseQuestionnaire::class;

    public function definition()
    {
        return [
            'course_id' => 2,
            'title' => $this->faker->sentence(3),
            'google_form_url' => $this->faker->url,
        ];
    }
}
