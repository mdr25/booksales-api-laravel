@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="text-center">
        <h1 class="mb-4">Author List</h1>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Bio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td><img src="{{ asset('images/' . $author['photo']) }}" width="50"></td>
                    <td>{{ $author['name'] }}</td>
                    <td>{{ $author['bio'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <a href="/books" class="btn btn-primary">View Books</a>
        <a href="/genres" class="btn btn-success">View Genres</a>
    </div>
@endsection
