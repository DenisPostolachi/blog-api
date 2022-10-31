<?php

declare(strict_types=1);

namespace App\Services\Articles;

use App\Data\ArticleData;
use App\Models\Article;
use App\Models\User;

final class ArticleService
{
    public function createArticle(ArticleData $articleData, int $userId): Article
    {
        return Article::create([
            'title' => $articleData->getTitle(),
            'text' => $articleData->getText(),
            'author_id' => $userId,
        ]);
    }

    public function updateArticle(ArticleData $articleData, Article $article, int $userId): void
    {
        $article->update([
            'title' => $articleData->getTitle(),
            'text' => $articleData->getText(),
            'author_id' => $userId
        ]);
    }
}
