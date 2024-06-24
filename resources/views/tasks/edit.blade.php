@extends('layouts.app')

@section('content')
    <div class="edit-board-container">
        <h1>Edit Task</h1>
        <div class="form-container">
            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('boards.tasks.update', [$board, $task]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="{{ $task->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="5">{{ $task->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" name="priority">
                        <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="assigned_user_id">Assigned User</label>
                    <select id="assigned_user_id" name="assigned_user_id">
                        <option value="">None</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $task->assigned_user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn edit-button">Update</button>
            </form>
            <a href="{{ route('boards.show', $board) }}" class="btn back-button">Back to Board</a>
        </div>
    </div>
@endsection
