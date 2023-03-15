<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Usuarios con una comunidad cada una
         \App\Models\User::factory(10)
         ->has(Community::factory(1)
            ->has(Post::factory(3)
                ->has(Comment::factory(4)))
         )
         ->create();

        //3 comentarios por 

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
