<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('authors')->insert([
            ['name' => 'J.K. Rowling', 'photo' => 'jk_rowling.jpg', 'bio' => 'British author, best known for Harry Potter.'],
            ['name' => 'George R.R. Martin', 'photo' => 'george_rr_martin.jpg', 'bio' => 'American novelist, known for Game of Thrones.'],
            ['name' => 'Isaac Asimov', 'photo' => 'isaac_asimov.jpg', 'bio' => 'Science fiction writer and professor.'],
            ['name' => 'J.R.R. Tolkien', 'photo' => 'jrr_tolkien.jpg', 'bio' => 'Author of Lord of the Rings and The Hobbit.'],
            ['name' => 'George Orwell', 'photo' => 'george_orwell.jpg', 'bio' => 'Writer of classic dystopian literature like 1984.']
        ]);
    }
}
