<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')        
                ->get();

        // dd($tasks);

        return view('tasks', ['tasks' => $tasks]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [ 'name' => 'required|max:255' ]);

        // Создание задачи

        $task = new Task;
        $task->name = $request->name;
        $task->user_id = auth()->user()->id;
        $task->save();
        return redirect('/');

        //$request->user()->tasks()->create(['name' => $request->name ]);        
        //return redirect('/tasks');        
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }

    public function setStatus($id)
    {
       Task::where('id', $id)->update(['status' => 'completed', ]);
 
        return redirect('/');
    }
}
