<?php

namespace Database\Factories;

use App\Models\CourseLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseLevelFactory extends Factory
{
    protected $model = CourseLevel::class;

    public function definition()
    {
        static $levelOrder = 1;

        return [
            'title' => 'Level ' . $levelOrder,
            'level_order' => $levelOrder++,
            'description' => $this->faker->optional()->sentence,
        ];
    }
}
