<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Book::with('author', 'genre')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'published_date' => 'required|date',
            'isbn' => 'required|string|max:13',
            'cover_image' => 'nullable|string',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }
}
