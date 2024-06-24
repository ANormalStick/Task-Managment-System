@extends('layouts.app')

@section('content')
    <div class="edit-board-container">
        <h1>Edit Board</h1>
        <div class="form-container">
            <form method="POST" action="{{ route('boards.update', $board->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Board Name</label>
                    <input type="text" id="name" name="name" value="{{ $board->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="5">{{ $board->description }}</textarea>
                </div>
                <button type="submit" class="btn edit-button">Update</button>
            </form>
            <a href="{{ route('boards.index') }}" class="btn back-button">Back to Boards</a>
        </div>
    </div>
@endsection
