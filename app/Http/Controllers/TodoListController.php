<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function show()
    {
        $todos = TodoList::where('user_id', Auth::user()->id)->get();
        return view('todo.show', compact('todos'));
    }

    public function showCreate()
    {
        return view('todo.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        TodoList::create($data);

        return redirect()->route('todo.show');
    }

    public function edit($id)
    {
        $todo = TodoList::find($id);
        return view('todo.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo = TodoList::find($id);
        $todo->update($request->all());
        return redirect()->route('todo.show');
    }

    public function destroy($id)
    {
        $todo = TodoList::find($id);
        $todo->delete();
        return redirect()->route('todo.show');
    }

}
