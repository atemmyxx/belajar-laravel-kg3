<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            'img' => $this->faker->sentence(mt_rand(1, 2)),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(5, 10))
                ->map(fn ($paragraf) => "<p>$paragraf</p>")
                ->implode(''),
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 2)


        ];
    }
}
