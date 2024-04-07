@extends('layout.app')

@section('title', 'Notes')

@section('content')
    <form method="POST" action="{{ route('note.store') }}" class="w-50 shadow py-5 px-4 rounded"
        style="background-color: #282b30;">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>

        <button type="submit" class="btn btn-primary">Add note</button>
    </form>
@endsection
