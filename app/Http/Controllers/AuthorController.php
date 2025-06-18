<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Author::with('books')->get()
        ]);
    }

    public function store(Request $request)
    {
        if (!$request->hasFile('photo')) {
            $request->merge(['photo' => null]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
        ]);

        $author = Author::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $author
        ]);
    }


    public function show($id)
    {
        $author = Author::with('books')->find($id);
        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author not found'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $author
        ]);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $author->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => $author
        ]);
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author not found'
            ], 404);
        }
        $author->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Author deleted successfully'
        ]);
    }
}
