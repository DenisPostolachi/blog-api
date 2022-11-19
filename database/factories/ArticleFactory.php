<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->name,
            'text' => fake()->text,
            'author_id' => User::factory(),
            'status_id' => Status::factory(),
        ];
    }
}
