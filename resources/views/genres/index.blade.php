@extends('layouts.app')

@section('title', 'Genres')

@section('content')
    <div class="text-center">
        <h1 class="mb-4">Genre List</h1>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre['name'] }}</td>
                    <td>{{ $genre['description'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <a href="/books" class="btn btn-primary">View Books</a>
        <a href="/authors" class="btn btn-success">View Authors</a>
    </div>
@endsection
