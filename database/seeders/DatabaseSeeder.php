<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Community;
use App\Models\Follow;
use App\Models\Like;
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
       //Cada comunidad tiene seguidores y posts
       //De los cuales cada uno tieme likes y comentarios
         \App\Models\User::factory(5)
         ->has(Follow::factory(4))
         ->has(Community::factory(2)   
            ->has(Follow::factory(4))
            ->has(Post::factory(3)
                ->has(Like::factory(4))
                ->has(Comment::factory(4)
                    ->has(Comment::factory(4))  
                    ->has(Like::factory(4))  
                ))
            )
            ->create();

            
        /*    \App\Models\User::factory(1)
                ->has(\App\Models\Community::factory(1)
                ->has(Follow::factory(1)) 
            ) ->create();


            \App\Models\User::factory(1)
            ->has(Follow::factory(1)
            ) ->create();
    \App\Models\User::factory(1)
                ->has(\App\Models\Community::factory(1)
                ->has(Follow::factory(1)) 
            ) ->create();


            \App\Models\User::factory(1)
            ->has(Follow::factory(1)
            ) ->create();
*/
            

       /* //Comentarios, likes y follows
        $comments = Comment::factory()->count(3)->for(
            Post::factory(), 'commentable'
        )->create();*/


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
