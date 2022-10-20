<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Reaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class ReactionSeeder extends Seeder
{
    public function run(): void
    {
        Reaction::factory()->count(10)->create();
    }
}
