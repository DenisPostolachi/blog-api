<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::factory()->count(10)->create();
    }
}
