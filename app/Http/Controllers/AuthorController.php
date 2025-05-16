<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')->get();
        return view('authors.index', compact('authors'));
    }
}
