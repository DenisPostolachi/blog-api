<?php

declare(strict_types=1);

namespace App\Services\Articles;

use App\Data\ArticleData;
use App\Models\Article;

final class ArticleService
{
    public function createArticle(ArticleData $articleData, $user): Article
    {
        return Article::create([
            'title' => $articleData->getTitle(),
            'text' => $articleData->getText(),
            'author_id' => $user->id
        ]);
    }

    public function updateArticle(ArticleData $articleData, Article $article, $user): void
    {
        $article->update([
            'title' => $articleData->getTitle(),
            'text' => $articleData->getText(),
            'author_id' => $user->id
        ]);
    }
}
