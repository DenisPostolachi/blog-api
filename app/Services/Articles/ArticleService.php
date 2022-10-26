<?php

declare(strict_types=1);

namespace App\Services\Articles;

use App\Http\Requests\Articles\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

final class ArticleService
{
    public function createArticle(ArticleRequest $request): Article
    {
        return Article::create([
            'title' => $request->title,
            'text' => $request->text,
            'author_id' => Auth::id()]
        );
    }
}
