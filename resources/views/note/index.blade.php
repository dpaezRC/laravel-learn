@extends('layout.app')

@section('title', 'Notes')

@section('content')
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="pe-0 col-2">
                <h2 class="m-0">Note list</h2>
            </div>
            <div class="p-0 col">
                <a class="btn btn-primary" style="text-decoration: none; color: white;" href="{{ route('note.create') }}">+</a>
            </div>
        </div>
        <hr />
        @if (count($notes) > 0)
            <table class="table table-light shadow table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($notes as $note)
                        <tr>
                            <th scope="row">{{ $note->title }}</th>
                            <td scope="row">{{ $note->description }}</td>
                            <td>
                                <a class="btn btn-primary" style="text-decoration: none; color: white;"
                                    href="{{ route('note.show', $note->id) }}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>no data available...</p>
        @endif
    </div>
@endsection
