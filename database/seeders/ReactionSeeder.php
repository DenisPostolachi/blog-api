<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Reaction;
use Illuminate\Database\Seeder;

final class ReactionSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getReaction() as $reaction) {
            Reaction::create(['text' => $reaction]);
        }
    }

    private function getReaction(): array
    {
        return [
            'smile',
            'sad',
            'omg',
        ];
    }
}
