<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskListController extends Controller
{

    public function show($id)
    {
        $tasks = Task::where('user_id', Auth::user()->id)->get();
        return view('task.show', compact('tasks'));
    }

    public function showCreate()
    {
        return view('task.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Task::create($data);

        return redirect()->route('task.show');
    }

    public function edit($id)
    {
        $todo = Task::find($id);
        return view('task.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo = Task::find($id);
        $todo->update($request->all());
        return redirect()->route('task.show');
    }

    public function checked()
    {

    }

    public function destroy($id)
    {
        $todo = Task::find($id);
        $todo->delete();
        return redirect()->route('task.show');
    }

}
