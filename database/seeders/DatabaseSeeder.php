<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\{
	Profile,
	CourseLevel,
	CourseCategory,
	Course,
	CourseWeek,
	CourseLesson,
	Quiz,
	Question,
	QuestionChoice,
	User,
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

		// Disable foreign key checks for a clean wipe (optional)
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		// Order: Levels -> Categories -> Users -> Courses -> Weeks -> Lessons -> Quizzes -> Questions -> Choices -> Attempts -> Answers -> Questionnaires
		// 1️⃣ Seed course levels
		CourseLevel::factory(5)->create();

		// 2️⃣ Seed course categories
		CourseCategory::factory(10)->create();

		// 4️⃣ Seed courses (with levels and categories)
		Course::factory(5)->create();

		// 5️⃣ Assign trainers to courses (pivot table)
		$this->call(CourseTrainersSeeder::class);

		// 6️⃣ Assign trainees to courses (pivot table)
		$this->call(CourseTraineesSeeder::class);

		// 7️⃣ Seed course weeks
		CourseWeek::factory(5)->create();

		// 8️⃣ Seed quizzes
		Quiz::factory(5)->create();

		// 9️⃣ Seed course lessons
		CourseLesson::factory(100)->create();

		// 🔟 Seed questions
		Question::factory(150)->create();

		// 1️⃣1️⃣ Seed question choices
		QuestionChoice::factory(100)->create();

		// 1️⃣2️⃣ Seed quiz attempts
		QuizAttempt::factory(10)->create();

		// 1️⃣3️⃣ Seed trainee answers
		TraineeAnswer::factory(200)->create();

		// 1️⃣4️⃣ Seed course questionnaires
		CourseQuestionnaire::factory(10)->create();

		// Re-enable foreign key checks (optional)
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
