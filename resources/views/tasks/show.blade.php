@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="task-edit-view-container">
        <h1>{{ $task->title }}</h1>
        <p>{{ $task->description }}</p>
        <p>Status: {{ $task->status }}</p>
        <p>Priority: {{ $task->priority }}</p>
        <p>Board: {{ $task->board->name }}</p>
        <p>Assigned User: {{ $task->assignedUser ? $task->assignedUser->name : 'None' }}</p>

        <a href="{{ route('boards.tasks.edit', [$board, $task]) }}" class="edit-button">Edit Task</a>
        <form action="{{ route('boards.tasks.destroy', [$board, $task]) }}" method="POST" class="delete-form" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete Task</button>
        </form>
        <br>
        <a href="{{ route('boards.show', $board) }}" class="back-button">Back to Board</a>
    </div>

    <div class="comments-section">
        <h2>Comments</h2>
        <ul>
            @foreach($task->comments as $comment)
                <li>
                    <div class="comment-body">
                        <span class="comment-author">{{ $comment->user->name }}:</span> {{ $comment->body }}
                    </div>
                    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'team_member')
                        <form action="{{ route('comments.destroy', [$task, $comment]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-comment-button">Delete</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>

        @auth
            <form action="{{ route('comments.store', $task) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="body">Add a Comment</label>
                    <textarea name="body" id="body" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endauth
    </div>
@endsection
