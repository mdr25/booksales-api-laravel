@extends('layouts.main')

@section('title', 'Books')

@section('content')
    <h1>Book List</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>Rp {{ number_format($book->price, 2) }}</td>
                    <td>{{ $book->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
