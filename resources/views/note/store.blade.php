@extends('layout.app')

@section('title', 'Notes')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form method="POST" action="{{ route('note.store') }}" class="w-50 shadow pt-4 pb-5 px-4 rounded"
            style="background-color: #282b30;">
            @csrf
            <h2 class="mb-3">Create task</h2>
            <hr/>
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
    </div>
@endsection
