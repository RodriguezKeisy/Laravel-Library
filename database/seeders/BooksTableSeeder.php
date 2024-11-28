<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'description' => 'A young wizard embarks on an adventure to find the Philosopher\'s Stone.',
                'pages' => 223,
                'author_id' => 1,
                'category_id' => 1,
                'image' => 'no-cover.webp',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'A Game of Thrones',
                'description' => 'A tale of power, politics, and dragons in the fictional land of Westeros.',
                'pages' => 694,
                'author_id' => 2,
                'category_id' => 1,
                'image' => 'no-cover.webp',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'The Hobbit',
                'description' => 'A hobbit goes on a journey with a group of dwarves to reclaim their treasure.',
                'pages' => 310,
                'author_id' => 3,
                'category_id' => 1,
                'image' => 'no-cover.webp',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => '1984',
                'description' => 'A dystopian novel by George Orwell that explores the dangers of totalitarianism.',
                'pages' => 328,
                'author_id' => 1,
                'category_id' => 3,
                'image' => 'no-cover.webp',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
