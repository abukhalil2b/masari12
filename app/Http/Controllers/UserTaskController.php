<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{


    public function index(User $user)
    {
        $tasks = Task::where('assigned_for',$user->id)
        ->latest()
        ->get();
        
        return view('admin.user.task.index',compact('tasks','user'));
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required',
            'user_id' => 'required'
        ]);

        $loggedUser = auth()->user();

        Task::create([
            'title' => strip_tags($request->title),//stripping away the script tags

            'assigned_for' => $request->user_id,

            'assigned_by' => $loggedUser->id,

            'updated_at' => NULL,
        ]);

        return redirect()->route('admin.user.task.index',$request->user_id);
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
