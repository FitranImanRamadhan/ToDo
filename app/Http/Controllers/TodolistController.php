<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{

    public function index()
    {
        // Retrieve all Todo items
        $todos = Todolist::where('user_id', Auth::id())->get();


        return view('todolists.index', compact('todos'));
    }

    public function index2()
    {
        $todos = Todolist::all();

        return view('todolists.index2', compact('todos'));
        
    }


    public function create()
    {
        $user = User::all();
        return view('todolists.create', compact(['user']));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'todo' => 'required',
        ]);


        Todolist::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'todo' => $request->todo,
        ]);

        return redirect()->route('todolists.index')->with('success', 'Todo created successfully.');
    }


    public function edit($id)
    {
        $user = User::all();
        $todo = Todolist::findOrFail($id);
        if ($todo->user_id != Auth::id()) {
            return redirect()->route('todolists.index')->with('error', 'Unauthorized action.');
        }

        return view('todolists.edit', compact('todo', 'user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'todo' => 'required',
        ]);

        $todo = Todolist::findOrFail($id);
        if ($todo->user_id != Auth::id()) {
            return redirect()->route('todolists.index')->with('error', 'Unauthorized action.');
        }


        $todo->update([
            'nama' => $request->nama,
            'todo' => $request->todo,
        ]);

        return redirect()->route('todolists.index')->with('success', 'Todo updated successfully.');
    }


    public function destroy($id)
    {
        $todo = Todolist::findOrFail($id);
        if ($todo->user_id != Auth::id()) {
            return redirect()->route('todolists.index')->with('error', 'Unauthorized action.');
        }


        $todo->delete();

        return redirect()->route('todolists.index')->with('success', 'Todo deleted successfully.');
    }
}
