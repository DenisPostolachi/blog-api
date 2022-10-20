<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class ReactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'text' => fake()->text,
        ];
    }
}
