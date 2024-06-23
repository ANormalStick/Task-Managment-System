@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Status: {{ $task->status }}</p>
    <p>Priority: {{ $task->priority }}</p>
    <p>Board: {{ $task->board->name }}</p>
    <p>Assigned User: {{ $task->assignedUser ? $task->assignedUser->name : 'None' }}</p>

    <a href="{{ route('boards.tasks.edit', [$board, $task]) }}">Edit Task</a>
    <form action="{{ route('boards.tasks.destroy', [$board, $task]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Task</button>
    </form>
    <br>
    <a href="{{ route('boards.show', $board) }}">Back to Board</a>
@endsection
