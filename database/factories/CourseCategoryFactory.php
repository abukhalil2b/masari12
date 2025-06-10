<?php

namespace Database\Factories;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseCategoryFactory extends Factory
{
    protected $model = CourseCategory::class;

    public function definition()
    {
        $name = $this->faker->unique()->words(2, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->optional()->paragraph,
            'parent_id' => null, // or you can assign later if needed for hierarchy
        ];
    }
}