<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCourseController extends Controller
{


    public function index()
    {
        //TODO check permission for other profiles 
        $courses = Course::all();

        $trainers = User::trainerIndex();

        
        return view('admin.course.index', compact('courses',  'trainers'));
    }

    public function show(Course $course)
    {

        return view('admin.course.show');
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
