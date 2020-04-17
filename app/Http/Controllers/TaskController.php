<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index()
    {
        if(Gate::allows('view-task', Auth::user())) {
            $user = auth()->user();
            $tasks = new Task;
            return view('welcome', ['tasks' => $tasks->where('user_id', $user->id)->get()]);
        }else{
            return redirect()->route('login');
        }
    }

    public function create(TaskRequest $req)
    {
        $currentUser = auth()->user();
        $user = User::where('id', '=' ,$currentUser->id)->first();
        $task = new Task();
        $task->title = $req->input('newTask');
        $user->tasks()->save($task);

        return redirect()->route('home');
    }
    public function delete($id)
    {
        Task::where('id', '=', $id)->delete();
        return redirect()->route('home');
    }
    public function update($id)
    {
        $task = Task::where('id', '=', $id)->first();
        return view('edit', ['task'=> $task]);
    }

    public function edit(TaskRequest $req){
        $id = $req->input('id');
        $title = $req->input('newTask');
        Task::where('id', '=', $id)->update(['title'=>$title]);
        return redirect()->route('home');
    }
}
