<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            "text" => fake()->text,
            'author_id' => User::factory(),
            'article_id' => Article::factory(),
        ];
    }
}
