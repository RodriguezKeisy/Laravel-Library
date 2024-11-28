<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create(['name' => 'J.K. Rowling', 'birthday' => date('1965-07-31')]);
        Author::create(['name' => 'George R.R. Martin', 'birthday' => date('1948-09-20')]);
        Author::create(['name' => 'J.R.R. Tolkien', 'birthday' => date('1892-01-03')]);
    }
}
