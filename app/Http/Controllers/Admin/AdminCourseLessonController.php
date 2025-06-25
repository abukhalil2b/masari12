<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\CourseLevel;
use App\Models\CourseTrainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminCourseLessonController extends Controller
{


    public function store(Request $request, Course $course)
    {

        return back()
            ->with('status', 'success')
            ->with('message', 'تمت إضافة الدرس بنجاح');
    }

    public function weeks_and_lessons_store(Request $request, Course $course)
    {

        foreach ($request->weeks as $weekData) {
            $week = $course->courseWeeks()->create([
                'title' => $weekData['title'],
                'order' => $weekData['order'] ?? 0,
                'description' => $weekData['description'] ?? null,
            ]);

            foreach ($weekData['lessons'] ?? [] as $lessonData) {
                $week->courseLessons()->create([
                    'course_id' => $week->course_id,
                    'title' => $lessonData['title'],
                    'type' => $lessonData['type'],
                    'url' => $lessonData['url'] ?? null,
                ]);
            }
        }

        return back()
            ->with('status', 'success')
            ->with('message', 'تمت إضافة الدرس بنجاح');
    }
}
