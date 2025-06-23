<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class AdminCourseCategoryController extends Controller
{

    public function index()
    {
        $course_categories = CourseCategory::whereNull('parent_id')
            ->with('children')
            ->get();

        return view('admin.course_categories.index', compact('course_categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:30|unique:course_categories,title',
            'group' => 'required|string|max:30',
            'position' => 'required|integer|min:1',
            'is_global' => 'sometimes|boolean',
            'parent_id' => 'nullable|exists:course_categories,id',
        ]);

        $validated['is_global'] = $request->has('is_global');

        CourseCategory::create($validated);

        return redirect()->route('admin.course_categories.index')
            ->with('status', 'success')
            ->with('message', 'تمت إضافة التصنيف بنجاح');
    }


    public function show(CourseCategory $courseCategory)
    {
        $courseCategory->load('children');

        return view('admin.course_categories.show', compact('courseCategory'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $courseCategory)
    {
        //
    }

    public function update(Request $request, CourseCategory $courseCategory)
    {
        // return $request->all();
        $rules = [
            'group' => 'required|string|max:30',
            'position' => 'required|integer|min:1',
            'is_global' => 'required|boolean',
        ];

        // Only validate 'title' for uniqueness if it has changed
        if ($request->input('title') !== $courseCategory->title) {
            $rules['title'] = 'required|string|max:30|unique:course_categories,title';
        } else {
            $rules['title'] = 'required|string|max:30';
        }

        $validated = $request->validate($rules);

        $courseCategory->update($validated);

        return redirect()->route('admin.course_categories.index')
            ->with('status', 'success')
            ->with('message', 'تم تحديث التصنيف بنجاح');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $courseCategory)
    {
        //
    }
}
