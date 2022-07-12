<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Article::factory(20)->create();
        Category::factory()->count(5)->create();
        Comment::factory()->count(40)->create();

        \App\Models\User::factory()->create([
            "name" => "alice",
            "email" => "alice@gmail.com"
        ]);

        \App\Models\User::factory()->create([
            "name" => "blice",
            "email" => "blice@gmail.com"
        ]);
    }
}
