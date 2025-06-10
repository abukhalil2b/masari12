<?php

namespace Database\Factories;
use App\Models\Course;
use App\Models\CourseLevel;
use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'cover_image_url' => $this->faker->optional()->imageUrl,
            'description' => $this->faker->optional()->paragraph,
            'language' => $this->faker->randomElement(['en', 'es', 'fr']),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived', 'completed']),
            'course_level_id' => CourseLevel::factory(),
            'course_category_id' => CourseCategory::factory(),
            'registration_type' => $this->faker->randomElement(['at_period', 'open']),
            'registration_start_at' => $this->faker->optional()->dateTimeBetween('-1 month', '+1 month'),
            'registration_end_at' => $this->faker->optional()->dateTimeBetween('+1 month', '+3 months'),
            'course_start_at' => $this->faker->optional()->dateTimeBetween('+2 months', '+6 months'),
            'course_end_at' => $this->faker->optional()->dateTimeBetween('+7 months', '+12 months'),
            'max_capacity' => $this->faker->optional()->numberBetween(10, 100),
            'price' => $this->faker->randomFloat(3, 0, 500),
        ];
    }
}
