<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCourseController extends Controller
{


    public function index(Request $request)
    {
        $categories = CourseCategory::all();

        // Check if a category is selected
        $selectedCategory = $request->input('category_id');

        // Filter courses based on selected category
        $coursesQuery = Course::with(['courseCategory', 'courseLevel']);

        if ($selectedCategory) {
            $coursesQuery->where('course_category_id', $selectedCategory);
        }

        $courses = $coursesQuery->get();

        return view('admin.course.index', compact('courses', 'categories', 'selectedCategory'));
    }


    public function show(Course $course)
    {
        return view('admin.course.show', compact('course'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'program_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'courseStore')
                ->withInput();
        }

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'active'
        ]);

        return back();
    }
}
