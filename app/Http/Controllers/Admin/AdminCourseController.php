<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLevel;
use App\Models\CourseTrainer;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminCourseController extends Controller
{


    public function index(Request $request)
    {
        $categories = CourseCategory::all();

        $levels = CourseLevel::all();

        $trainers = User::trainerIndex();

        // Check if a category is selected
        $selectedCategory = $request->input('category_id');

        // Filter courses based on selected category
        $coursesQuery = Course::with(['courseCategory', 'courseLevel']);

        if ($selectedCategory) {
            $coursesQuery->where('course_category_id', $selectedCategory);
        }

        $courses = $coursesQuery->get();

        return view('admin.course.index', compact('courses', 'selectedCategory', 'categories', 'levels', 'trainers'));
    }


    public function show(Course $course)
    {
        $quizzes = Quiz::all();

        return view('admin.course.show', compact('course','quizzes'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'level_id' => 'required',
            'trainer_id' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            
            $course = Course::create([
                'title' => $request->title,
                'course_category_id' => $request->category_id,
                'course_level_id' =>  $request->level_id,
            ]);

            CourseTrainer::create(['course_id' => $course->id, 'trainer_id' => $request->trainer_id]);
        });

        return back()->with('status', 'success')
            ->with('message', 'تم بنجاح');
    }

    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }
}
