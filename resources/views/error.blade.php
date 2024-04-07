@extends('layout.app')

@section('title', 'Error')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h2>Error:</h2>
            <div class="alert alert-danger mx-auto" role="alert" style="max-width: 500px;">
                {{ $message }}
            </div>
        </div>
    </div>
@endsection
