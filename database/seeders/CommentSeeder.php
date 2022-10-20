<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

final class CommentSeeder extends Seeder
{
    public function run(): void
    {
        Comment::factory()->count(10)->create();
    }
}
