<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Article;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Factories\Factory;


final class ArticleReactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'article_id' => Article::factory(),
            'reaction_id' => Reaction::factory()
        ];
    }
}
