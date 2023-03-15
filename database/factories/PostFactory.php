<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name= $this-> faker->unique()->sentence();
        return [
            'title' => $name,
            'slug'=>Str::slug($name),
            'body' => fake()->text(),
            'user_id' => User::all()->random(),
        ];
    }
}
