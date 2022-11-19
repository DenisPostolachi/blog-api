<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status_name' => $this->faker->randomElement(['pending' ,'success', 'error']),
            'color' => $this->faker->randomElement(['red' ,'green', 'blue'])
        ];
    }
}
