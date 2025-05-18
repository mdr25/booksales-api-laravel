<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run()
    {
        DB::table('genres')->insert([
            ['name' => 'Fiction', 'description' => 'A literary work based on the imagination and not necessarily on fact.'],
            ['name' => 'Non-Fiction', 'description' => 'A literary work based on facts and real events.'],
            ['name' => 'Science Fiction', 'description' => 'A genre that deals with imaginative and futuristic concepts.'],
            ['name' => 'Romance', 'description' => 'A genre that focuses on love and romance.'],
            ['name' => 'Fantasy', 'description' => 'A genre filled with magic, mythical creatures, and epic adventures.']
        ]);
    }
}
