<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        Post::factory()->create();

        // $user = User::factory(3)->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // $hobbies = Category::create([
        //     'name' => 'Hobbies',
        //     'slug' => 'hobbies'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'MY FIRST TITLE',
        //     'slug' => '1stslug',
        //     'excerpt' => '1stexcerpt',
        //     'body' => 'LoremLorem'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'MY 2nd TITLE',
        //     'slug' => '2ndslug',
        //     'excerpt' => '2ndexcerpt',
        //     'body' => 'LoremLoremSinta'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $hobbies->id,
        //     'title' => 'MY 3rd TITLE',
        //     'slug' => '3rdslug',
        //     'excerpt' => '3rdexcerpt',
        //     'body' => 'LoremLoremSintabuko'
        // ]);
    }
}
