<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Board;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('tasks.index')->withErrors('You do not have permission to create tasks.');
        }

        $boards = Board::all();
        $users = User::all();
        return view('tasks.create', compact('boards', 'users'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('tasks.index')->withErrors('You do not have permission to create tasks.');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'priority' => 'required',
            'board_id' => 'required',
            'assigned_user_id' => 'nullable'
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('tasks.index')->withErrors('You do not have permission to edit tasks.');
        }

        $boards = Board::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'boards', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('tasks.index')->withErrors('You do not have permission to edit tasks.');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'priority' => 'required',
            'board_id' => 'required',
            'assigned_user_id' => 'nullable'
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('tasks.index')->withErrors('You do not have permission to delete tasks.');
        }

        $task->delete();
        return redirect()->route('tasks.index');
    }
}
