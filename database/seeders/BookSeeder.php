<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('books')->insert([
            ['title' => 'Harry Potter and the Sorcerer\'s Stone', 'description' => 'First book in the Harry Potter series.', 'price' => 50000, 'stock' => 50, 'cover_photo' => 'harry_potter.jpg', 'genre_id' => 1, 'author_id' => 1],
            ['title' => 'The Lord of the Rings', 'description' => 'Classic fantasy novel by J.R.R. Tolkien.', 'price' => 60000, 'stock' => 30, 'cover_photo' => 'the_lord_of_the_rings.jpg', 'genre_id' => 1, 'author_id' => 2],
            ['title' => '1984', 'description' => 'Dystopian novel by George Orwell.', 'price' => 40000, 'stock' => 40, 'cover_photo' => '1984.jpg', 'genre_id' => 2, 'author_id' => 5],
            ['title' => 'The Hitchhiker\'s Guide to the Galaxy', 'description' => 'Comedy science fiction novel.', 'price' => 30000, 'stock' => 20, 'cover_photo' => 'the_hitchhikers_guide_to_the_galaxy.jpg', 'genre_id' => 3, 'author_id' => 3],
            ['title' => 'The Hobbit', 'description' => 'Fantasy novel by J.R.R. Tolkien.', 'price' => 50000, 'stock' => 50, 'cover_photo' => 'the_hobbit.jpg', 'genre_id' => 1, 'author_id' => 2]
        ]);
    }
}
