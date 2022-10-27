<?php

declare(strict_types=1);

namespace App\Repositories\Article;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

final class ArticleRepository
{
    public function getAll(): Collection
    {
        return Article::all();
    }
}
