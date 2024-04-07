@extends('layout.app')

@section('title', 'Notes')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form method="POST" action="{{ route('note.update', $note->id) }}" class="w-50 shadow pt-4 pb-5 px-4 rounded"
            style="background-color: #282b30;">
            @csrf
            @method('PUT')
            <h2 class="mb-3">Update task</h2>
            <hr />
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $note->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger mx-auto" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ $note->description }}">
            </div>
            @error('description')
                <div class="alert alert-danger mx-auto" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
