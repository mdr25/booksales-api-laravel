<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $fillable = ['name', 'description'];

    public static function allGenres()
    {
        return [
            [
                'id' => 1,
                'name' => 'Fiction',
                'description' => 'A literary work based on the imagination and not necessarily on fact.'
            ],
            [
                'id' => 2,
                'name' => 'Non-Fiction',
                'description' => 'A literary work based on facts and real events.'
            ],
            [
                'id' => 3,
                'name' => 'Science Fiction',
                'description' => 'A genre that deals with imaginative and futuristic concepts.'
            ],
            [
                'id' => 4,
                'name' => 'Fantasy',
                'description' => 'Stories that contain magical or supernatural elements.'
            ],
            [
                'id' => 5,
                'name' => 'History',
                'description' => 'Books that explore historical events and narratives.'
            ]
        ];
    }
}
