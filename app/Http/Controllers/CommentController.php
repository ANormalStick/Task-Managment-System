<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $task->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return back();
    }

    public function destroy(Task $task, Comment $comment)
    {
        // Check if the user is authorized to delete the comment
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'team_member') {
            return back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();
        return back()->with('success', 'Comment deleted successfully.');
    }
}


