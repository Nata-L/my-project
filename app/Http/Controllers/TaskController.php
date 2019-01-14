<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function show()
    {
        return view('tasks', ['tasks' => Task::orderBy('created_at', 'asc')->get()]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required|max:255']);

        // dd($request->all());
        
        if ($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }
        
        // Создание задачи
        $task = new Task;
        $task->name = $request->name;
        $task->save();

    return redirect('/');
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }
}
