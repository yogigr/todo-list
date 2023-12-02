<?php

namespace YogiGr\TodoList\Http\Controllers;

use Illuminate\Http\Request;
use YogiGr\TodoList\Models\Todo;
use App\Http\Controllers\Controller;

class TodoListController extends Controller
{
    public function index()
    {
        $todos = Todo::with('user')->latest()->get();
        return view('todo::index', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required|string|max:255',
        ]);
 
        $todo = Todo::create([
            'todo' => $request->input('todo'),
            'user_id' => auth()->id()
        ]);
 
        return redirect(route('todo.index'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Todo $todo)
    {
        return view('todo::edit', [
            'todo' => $todo,
        ]);
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'todo' => 'required|string|max:255',
        ]);
 
        $todo->update([
            'todo' => $request->input('todo'),
            'user_id' => auth()->id()
        ]);
 
        return redirect(route('todo.index'));
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
 
        return redirect(route('todo.index'));
    }
}
