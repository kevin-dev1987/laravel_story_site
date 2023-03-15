<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Story::factory(10)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Rating::factory(20)->create();
        \App\Models\Tag::factory(70)->create();
        \App\Models\Like::factory(300)->create();
        \App\Models\Follow::factory(200)->create();
        \App\Models\Kudos::factory(200)->create();
        \App\Models\Comment::factory(150)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
