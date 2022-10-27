<?php

declare(strict_types=1);

namespace App\Repositories\Article;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

final class ArticleRepository
{
    /**
     * @return Collection<int, Article>
    */
    public function getAll(): Collection
    {
        return Article::all();
    }
}
