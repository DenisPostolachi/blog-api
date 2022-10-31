<?php

declare(strict_types=1);

namespace App\Services\Articles;

use App\Data\ArticleData;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

final class ArticleService
{
    public function createArticle(ArticleData $articleData ): Article
    {
        return Article::create([
            'title' => $articleData->getTitle(),
            'text' => $articleData->getText(),
            'author_id' => Auth::id()]
        );
    }

    public function updateArticle(ArticleData $articleData, Article $article): void
    {
         $article->update([
            'title' => $articleData->getTitle(),
            'text' => $articleData->getText(),
            'author_id' => Auth::id()
        ]);
    }
}
