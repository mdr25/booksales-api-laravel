@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="text-center">
        <h1 class="mb-4">Book List</h1>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Genre</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td><img src="{{ asset('images/' . $book['cover_photo']) }}" width="50"></td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['description'] }}</td>
                    <td>Rp {{ number_format($book['price'], 2) }}</td>
                    <td>{{ $book['stock'] }}</td>
                    <td>{{ \App\Models\Genre::allGenres()[$book['genre_id'] - 1]['name'] }}</td>
                    <td>
                        <img src="{{ asset('images/' . \App\Models\Author::allAuthors()[$book['author_id'] - 1]['photo']) }}"
                            width="50">
                        <br>{{ \App\Models\Author::allAuthors()[$book['author_id'] - 1]['name'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <a href="/genres" class="btn btn-primary">View Genres</a>
        <a href="/authors" class="btn btn-success">View Authors</a>
    </div>

@endsection
