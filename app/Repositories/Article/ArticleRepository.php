<?php

declare(strict_types=1);

namespace App\Repositories\Article;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

final class ArticleRepository
{
    public function getAllWithPagination(): LengthAwarePaginator
    {
        return Article::paginate(10);
    }
}
