@extends('layout.app')

@section('title', 'Notes')

@section('content')
    <div class="container mt-5">
        <div class="row align-items-center justify-content-between">
            <div class="col">
                <h2 class="m-0">Note list</h2>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" style="text-decoration: none; color: white;"
                        href="{{ route('note.create') }}">+</a>
                </div>
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
                                    href="{{ route('note.show', $note->id) }}">Edit</a>
                                <button class="btn btn-danger" onclick="deleteTask({{ $note->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-primary" role="alert">
                No data available...
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        async function deleteTask(id) {
            try {
                const fetchOptions = {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                };
                await fetch(`{{ route('note.destroy', '') }}/${id}`, fetchOptions);
                window.location.reload();
            } catch (error) {
                alert('Error al eliminar el registro.');
            }
        }
    </script>
@endsection
