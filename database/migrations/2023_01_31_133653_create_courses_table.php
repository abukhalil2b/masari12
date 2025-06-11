<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        /**
         * course_levels Table
         * Stores predefined levels for courses (e.g., Beginner, Intermediate, Advanced).
         * Each level has a unique title and an order for display.
         */
        Schema::create('course_levels', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30)->unique();//Human-readable title of the course level (e.g., "Level 1")
            $table->tinyInteger('level_order')->unique();//Numerical order for sorting and display (e.g., 1, 2, 3)
            $table->text('description')->nullable();//Optional detailed description of the level
            $table->timestamps();
        });

        /**
         * course_categories Table
         * Stores categories to organize courses (e.g., Software Development, Marketing).
         * Each category has a unique name and a slug for URL-friendly representation.
         */
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();//Human-readable name of the course category (e.g., "Software Development")
            $table->string('slug', 30)->unique();//URL-friendly unique identifier for the category (e.g., "software-dev")
            $table->text('description')->nullable();//Optional detailed description of the category
            $table->foreignId('parent_id')->nullable()->constrained('course_categories')->onDelete('SET NULL'); // Self-referencing foreign key for hierarchical categories. Null if a top-level category.
        $table->timestamps();//Categories can be created/updated
        });

        /**
         * courses Table
         * Main table for course definitions.
         * Contains core course information, registration details, pricing, and links to categories and levels.
         */
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');//The main title of the course
            $table->string('cover_image_url', 255)->nullable(); // Increased length to 255 for modern URLs
            $table->text('description')->nullable();//Detailed description of the course content and objectives
            $table->string('language', 10)->nullable();
            $table->string('status', 10)->default('draft');//Current status of the course (e.g., "draft", "published", "archived", "completed")

            // Foreign keys for course classification
            $table->foreignId('course_level_id')->constrained('course_levels')->onDelete('restrict');
            $table->foreignId('course_category_id')->constrained('course_categories')->onDelete('restrict');

            // Registration and scheduling details
            $table->enum('registration_type', ['at_period', 'open'])->default('open');//Determines how trainees can register: "at_period" for fixed enrollment windows, "open" for continuous enrollment
            $table->timestamp('registration_start_at')->nullable(); //Start date and time for registration (for "at_period" courses)
            $table->timestamp('registration_end_at')->nullable(); //End date and time for registration (for "at_period" courses)
            $table->timestamp('course_start_at')->nullable(); //Start date and time for the course content availability (for "at_period" courses)
            $table->timestamp('course_end_at')->nullable(); //End date and time for the course content availability (for "at_period" courses)
            $table->tinyInteger('max_capacity')->nullable(); //Maximum number of trainees allowed (for "at_period" courses, nullable for "open" courses)
            $table->tinyInteger('points')->nullable(); //points for trainee when he finished course
            $table->tinyInteger('total_lessons')->default(0); //we can calculate it while creating lessons. it is better for quering
            $table->tinyInteger('total_hours')->default(0); //we can calculate it while creating lessons. it is better for quering
            $table->boolean('is_only_live')->default(false); //some course will be only online by Google meet or Zoom
            $table->boolean('is_free')->default(true); //if it is not free then we activate next 2 fields (purchase_price,purchase_points)

            $table->decimal('purchase_price', 7, 3)->default(0); //Price of the course (e.g., 13.000). Trainee can take it by money
            $table->integer('purchase_points')->default(0); //Price of the course (e.g., 5000 points). Trainee can take it by points
            $table->timestamps();
        });

        /**
         * course_trainers Table (Pivot Table)
         * Links users (with 'trainer' role) to courses, indicating which trainers are assigned to which courses.
         */
        Schema::create('course_trainers', function (Blueprint $table) {
            $table->foreignId('trainer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->primary(['trainer_id', 'course_id']);
            $table->timestamps();//for auditing trainer assignments.
        });

        Schema::create('course_trainees', function (Blueprint $table) {
            $table->foreignId('trainee_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->primary(['trainee_id', 'course_id']); //Composite primary key to ensure a unique enrollment of a trainee in a course
            $table->enum('status', ['pending_approval', 'enrolled', 'graduated', 'failed', 'withdrawn'])->default('pending_approval');
            $table->timestamps();
        });

        /**
         * course_weeks Table
         * Organizes courses into structured weekly modules or units, allowing for phased content delivery.
         */
        Schema::create('course_weeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); //Foreign key to the course this week/module belongs to
            $table->string('title'); //Title of the week or module (e.g., "Week 1: Introduction to Marketing")
            $table->unsignedInteger('order')->default(0); //Display order of the week/module within its course
            $table->text('description')->nullable(); //Optional description for the week/module
            $table->timestamps();
        });

        /**
         * quizzes Table
         * Defines quizzes that can be associated with lessons. A quiz is a collection of questions.
         */
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //Title of the quiz (e.g., "Lesson 1 Quiz", "Mid-Term Assessment")
            $table->text('description')->nullable(); //Optional description or instructions for the quiz
            $table->unsignedSmallInteger('passing_score_percentage')->nullable(); //Required percentage score to pass the quiz (e.g., 70)
            $table->unsignedSmallInteger('time_limit_minutes')->nullable(); //Time limit for completing the quiz, in minutes
            $table->timestamps();
        });

        /**
         * course_lessons Table
         * Stores individual lessons within a course or course week.
         * Lessons can be various content types (video, live, file, text) or a quiz.
         */
        Schema::create('course_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Added a title for the lesson itself
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); //Foreign key to the course this lesson belongs to
            $table->foreignId('course_week_id')->nullable()->constrained('course_weeks')->onDelete('cascade'); //Foreign key to the course_weeks table, if the lesson belongs to a specific week/module
            $table->unsignedInteger('order')->default(0); //Display order of the lesson within its week or course
            $table->enum('type', ['video', 'live', 'file', 'text', 'quiz'])->default('text'); //Type of lesson content (e.g., "video", "live", "file", "text", "quiz")
            $table->text('content')->nullable(); //HTML-rich text content for "text" lessons, or supplementary description/embed code for other types
            $table->string('url', 255)->nullable(); //URL for video, live meeting link, or file download (e.g., PDF, PowerPoint)
            $table->foreignId('quiz_id')->nullable()->constrained('quizzes')->onDelete('restrict'); //Foreign key to the quizzes table, if this lesson is a quiz
            $table->timestamps();
        });

        /**
         * trainee_lesson_progress Table (Pivot Table)
         * Tracks the individual progress of each trainee on each lesson.
         */
        Schema::create('trainee_lesson_progress', function (Blueprint $table) {
            $table->foreignId('trainee_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_lesson_id')->constrained('course_lessons')->onDelete('cascade');
            $table->primary(['trainee_id', 'course_lesson_id']);
            $table->enum('status', ['not_started', 'in_progress', 'completed', 'skipped'])->default('not_started'); //Current status of the trainee on this lesson
            $table->timestamp('completed_at')->nullable(); //Timestamp when the trainee completed this lesson
            $table->timestamps(); // created_at: when progress record was initiated, updated_at: when status or completed_at changed
        });

        /**
         * questions Table
         * Stores individual questions that are part of quizzes.
         * The question type determines how answers are provided and graded.
         */
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->enum('type', ['single_choice', 'text_input', 'numeric_input'])->default('single_choice'); //Type of question: "single_choice" (one correct answer), "text_input" (open text field), "numeric_input" (numerical answer)
            $table->text('question_text'); //The actual content of the question
            $table->text('correct_answer_value')->nullable(); //The exact value for "text_input" or "numeric_input" correct answers
            $table->timestamps();
        });

        /**
         * question_choices Table
         * Stores possible answer choices for single-choice questions.
         */
        Schema::create('question_choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
            $table->text('choice_text'); //The content of the answer choice
            $table->boolean('is_correct')->default(false); //Indicates if this choice is a correct answer for the question
            $table->unsignedTinyInteger('order')->default(0); //Display order of the choice within its question (e.g., for A, B, C rendering)
            $table->unique(['question_id', 'order']); //Ensures unique order for choices within a question
        });

        /**
         * quiz_attempts Table
         * Tracks each time a trainee attempts a quiz (collection of questions).
         */
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainee_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade');
            $table->timestamp('started_at'); //Timestamp when the quiz attempt began
            $table->timestamp('completed_at')->nullable(); //Timestamp when the quiz attempt was completed (null if still in progress)
            $table->unsignedSmallInteger('score')->nullable(); //Score achieved by the trainee for this attempt (e.g., as a percentage or raw score)
            $table->unsignedTinyInteger('attempt_number')->default(1); //Sequential number of the attempt for a given trainee on a quiz
            $table->timestamps();// tracks when an attempt record is created/last 
        });

        /**
         * trainee_answers Table
         * Stores individual answers provided by trainees for each question within a quiz attempt.
         */
        Schema::create('trainee_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_attempt_id')->constrained('quiz_attempts')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');

            $table->foreignId('selected_choice_id')->nullable()->constrained('question_choices')->onDelete('cascade');//Foreign key to question_choices table, for single_choice questions
            $table->text('text_answer')->nullable();//The trainee\'s typed answer for "text_input" or "numeric_input" questions

            $table->boolean('is_correct')->nullable();//Indicates if the trainee\'s answer was correct (null before grading, then true/false)
            $table->timestamps(); // created_at: when the answer was first saved; updated_at: when answer or grading changed
        });

        /**
         * course_questionnaires Table
         * Stores links to external feedback forms (e.g., Google Forms) associated with courses.
         */
        Schema::create('course_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('title')->nullable();//Title of the questionnaire (e.g., "End of Course Feedback Survey")
            $table->string('google_form_url', 255);//URL of the Google Form or other external survey
            $table->timestamps(); // Track creation/update of the questionnaire link
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_questionnaires');
        Schema::dropIfExists('trainee_answers');
        Schema::dropIfExists('quiz_attempts');
        Schema::dropIfExists('question_choices');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('trainee_lesson_progress');
        Schema::dropIfExists('course_lessons');
        Schema::dropIfExists('quizzes'); // Drop after course_lessons if course_lessons can reference quizzes
        Schema::dropIfExists('course_weeks');
        Schema::dropIfExists('course_trainees');
        Schema::dropIfExists('course_trainers');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_categories');
        Schema::dropIfExists('course_levels');
    }
};
