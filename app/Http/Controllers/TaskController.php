<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    // get all my tasks
    public function index()
    {
        $loggedUser = auth()->user();

        $tasks = Task::where('assigned_for',$loggedUser->id)
        ->latest()
        ->get();
        
        return view('admin.task.index',compact('tasks'));
    }

    // store my tasks
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $loggedUser = auth()->user();

        Task::create([
            'title'=> strip_tags($request->title),//stripping away the script tags
            'assigned_for' => $loggedUser->id,
            'assigned_by' => $loggedUser->id,
            'updated_at' => NULL,
        ]);

        return back();
    }

    public function edit(Task $task)
    {
        //
    }


    public function update(Request $request, Task $task)
    {

        $task->update([
            'title'=>$request->title
        ]);

        return back();
    }


    public function destroy(Task $task)
    {
        $loggedUser = auth()->user();

        if($task->assigned_by == $loggedUser->id){

            $task->delete();

            return back();

        }

        abort(403);
    }
}
