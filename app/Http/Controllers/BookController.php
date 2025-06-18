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
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'cover_photo' => 'required|image|max:2048',
        ]);

        // Simpan file cover
        if ($request->hasFile('cover_photo')) {
            $file = $request->file('cover_photo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension(); // hasil: abc123.jpg
            $file->storeAs('public/covers', $filename); // simpan ke storage/app/public/covers
            $validated['cover_photo'] = $filename; // hanya simpan nama file
        }

        $book = Book::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }


    public function show($id)
    {
        $book = Book::with('author', 'genre')->find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'cover_photo' => 'nullable|file|image|max:2048',
        ]);

        if ($request->hasFile('cover_photo')) {
            $file = $request->file('cover_photo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/covers', $filename);
            $validated['cover_photo'] = $filename;
        }

        $book->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }



    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found'
            ], 404);
        }
        $book->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Book deleted successfully'
        ]);
    }
}
