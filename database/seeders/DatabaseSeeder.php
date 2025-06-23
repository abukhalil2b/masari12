<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\{
	Profile,
	CourseLevel,
	CourseCategory,
	CourseWeek,
	CourseLesson,
	Quiz,
	Question,
	QuestionChoice,
	QuizAttempt,
	TraineeAnswer,
	CourseQuestionnaire
};
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

	public function run(): void
	{
		$profilesData = [
            ['title' => 'admin'],
            ['title' => 'trainer'],
            ['title' => 'trainee'],
            ['title' => 'support']
        ];

        foreach ($profilesData as $data) {
            Profile::create(['title' => $data['title']]);
        }

		$this->call(UsersTableSeeder::class);

		$this->call(ProfilesAndPermissionsSeeder::class);
		
		$this->call(CourseCategorySeeder::class);
		
		$this->call(CourseTableSeeder::class);

	}
}
