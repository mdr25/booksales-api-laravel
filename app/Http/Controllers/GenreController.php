<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Genre::with('books')->get()
        ]);
    }
}
