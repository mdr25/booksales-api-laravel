<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['title', 'description', 'price', 'stock', 'cover_photo', 'genre_id', 'author_id'];

    public static function allBooks()
    {
        return [
            [
                'id' => 1,
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'description' => 'The first book in the Harry Potter series.',
                'price' => 25000.00,
                'stock' => 37,
                'cover_photo' => 'harry_potter.jpg',
                'genre_id' => 1,
                'author_id' => 1
            ],
            [
                'id' => 2,
                'title' => 'The Lord of the Rings',
                'description' => 'A classic fantasy novel by J.R.R. Tolkien.',
                'price' => 60000.00,
                'stock' => 28,
                'cover_photo' => 'the_lord_of_the_rings.jpg',
                'genre_id' => 1,
                'author_id' => 2
            ],
            [
                'id' => 3,
                'title' => '1984',
                'description' => 'A dystopian novel by George Orwell.',
                'price' => 40000.00,
                'stock' => 40,
                'cover_photo' => '1984.jpg',
                'genre_id' => 2,
                'author_id' => 3
            ],
            [
                'id' => 4,
                'title' => 'The Hitchhiker\'s Guide to the Galaxy',
                'description' => 'A comedy science fiction novel by Douglas Adams.',
                'price' => 30000.00,
                'stock' => 20,
                'cover_photo' => 'the_hitchhikers_guide_to_the_galaxy.jpg',
                'genre_id' => 3,
                'author_id' => 3
            ],
            [
                'id' => 5,
                'title' => 'The Hobbit',
                'description' => 'A fantasy novel by J.R.R. Tolkien.',
                'price' => 50000.00,
                'stock' => 8,
                'cover_photo' => 'the_hobbit.jpg',
                'genre_id' => 1,
                'author_id' => 2
            ]
        ];
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
