<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = ['name', 'photo', 'bio'];

    public static function allAuthors()
    {
        return [
            [
                'id' => 1,
                'name' => 'J.K. Rowling',
                'photo' => 'jk_rowling.jpg',
                'bio' => 'British author, best known for the Harry Potter series.'
            ],
            [
                'id' => 2,
                'name' => 'George R.R. Martin',
                'photo' => 'george_rr_martin.jpg',
                'bio' => 'American novelist, known for A Song of Ice and Fire.'
            ],
            [
                'id' => 3,
                'name' => 'Isaac Asimov',
                'photo' => 'isaac_asimov.jpg',
                'bio' => 'Science fiction writer and professor of biochemistry.'
            ],
            [
                'id' => 4,
                'name' => 'J.R.R. Tolkien',
                'photo' => 'jrr_tolkien.jpg',
                'bio' => 'Author of The Lord of the Rings and The Hobbit.'
            ],
            [
                'id' => 5,
                'name' => 'George Orwell',
                'photo' => 'george_orwell.jpg',
                'bio' => 'Writer of classic dystopian literature like 1984.'
            ]
        ];
    }
}
