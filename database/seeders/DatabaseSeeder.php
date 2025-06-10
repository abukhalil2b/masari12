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
		$profiles = ['admin', 'trainer', 'trainee'];


		foreach ($profiles as $profile) {
			Profile::create(['title' => $profile]);
		}

		$this->call(UsersTableSeeder::class);

		$this->call(ProfilesAndPermissionsSeeder::class);

		// Disable foreign key checks for a clean wipe (optional)
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		// Order: Levels -> Categories -> Users -> Courses -> Weeks -> Lessons -> Quizzes -> Questions -> Choices -> Attempts -> Answers -> Questionnaires
		// 1️⃣ Seed course levels
		CourseLevel::factory(2)->create();

		// 2️⃣ Seed course categories
		CourseCategory::factory(3)->create();

		// 4️⃣ Seed courses (with levels and categories)
		$this->call(CourseTableSeeder::class);

		// 7️⃣ Seed course weeks
		CourseWeek::factory(2)->create();

		// 8️⃣ Seed quizzes
		Quiz::factory(5)->create();

		// 9️⃣ Seed course lessons
		CourseLesson::factory(40)->create();

		// 🔟 Seed questions
		Question::factory(60)->create();

		// 1️⃣1️⃣ Seed question choices
		QuestionChoice::factory(80)->create();

		// 1️⃣2️⃣ Seed quiz attempts
		QuizAttempt::factory(10)->create();

		// 1️⃣3️⃣ Seed trainee answers
		TraineeAnswer::factory(100)->create();

		// 1️⃣4️⃣ Seed course questionnaires
		CourseQuestionnaire::factory(6)->create();

		// Re-enable foreign key checks (optional)
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
