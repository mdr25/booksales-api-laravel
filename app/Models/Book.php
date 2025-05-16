<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['title', 'description', 'price', 'stock', 'cover_photo', 'genre_id', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Book extends Model
// {
//     use HasFactory;
//     protected $table = 'books';
//     protected $fillable = ['title', 'genre_id', 'author_id'];

//     public static function allBooks()
//     {
//         return [
//             ['id' => 1, 'title' => 'Pride and Prejudice', 'genre_id' => 1, 'author_id' => 1],
//             ['id' => 2, 'title' => 'The Adventures of Tom Sawyer', 'genre_id' => 1, 'author_id' => 2],
//             ['id' => 3, 'title' => 'Foundation', 'genre_id' => 3, 'author_id' => 3],
//             ['id' => 4, 'title' => 'Harry Potter and the Sorcerer\'s Stone', 'genre_id' => 5, 'author_id' => 4],
//             ['id' => 5, 'title' => '1984', 'genre_id' => 2, 'author_id' => 5],
//         ];
//     }

//     public function genre()
//     {
//         return $this->belongsTo(Genre::class);
//     }

//     public function author()
//     {
//         return $this->belongsTo(Author::class);
//     }
// }
