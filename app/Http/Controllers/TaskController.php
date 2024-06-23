<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Board;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request, Board $board)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('boards.show', $board)->withErrors('You do not have permission to create tasks.');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'priority' => 'required',
            'assigned_user_id' => 'nullable'
        ]);

        $board->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'assigned_user_id' => $request->assigned_user_id
        ]);

        return redirect()->route('boards.show', $board);
    }

    public function show(Board $board, Task $task)
    {
        return view('tasks.show', compact('board', 'task'));
    }

    public function edit(Board $board, Task $task)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('boards.show', $board)->withErrors('You do not have permission to edit tasks.');
        }

        $users = User::all();
        return view('tasks.edit', compact('board', 'task', 'users'));
    }

    public function update(Request $request, Board $board, Task $task)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return redirect()->route('boards.show', $board)->withErrors('You do not have permission to edit tasks.');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'priority' => 'required',
            'assigned_user_id' => 'nullable'
        ]);

        $task->update($request->all());
        return redirect()->route('boards.show', $board);
    }

    public function destroy(Board $board, Task $task)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('boards.show', $board)->withErrors('You do not have permission to delete tasks.');
        }

        $task->delete();
        return redirect()->route('boards.show', $board);
    }
}
