@extends('layouts.app')

@section('title', $board->name)

@section('content')
        <h1>{{ $board->name }}</h1>
        <p>{{ $board->description }}</p>

        <h2>Tasks</h2>
        <ul class="task-list">
            @foreach ($board->tasks as $task)
                <li class="task-item">
                    <a href="{{ route('boards.tasks.show', [$board, $task]) }}">{{ $task->title }}</a>
                    <div class="buttons">
                        <form action="{{ route('boards.tasks.destroy', [$board, $task]) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <h2>Add a new Task</h2>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('boards.tasks.store', $board) }}" class="form-container">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" required>
            <label for="description">Description</label>
            <textarea name="description"></textarea>
            <label for="status">Status</label>
            <select name="status">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            <label for="priority">Priority</label>
            <select name="priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            <label for="assigned_user_id">Assigned User</label>
            <select name="assigned_user_id">
                <option value="">None</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit">Create</button>
        </form>

        <a href="{{ route('boards.index') }}" class="back-button">Back to Boards</a>
@endsection
