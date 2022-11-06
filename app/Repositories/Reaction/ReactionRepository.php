<?php

declare(strict_types=1);

namespace App\Repositories\Reaction;

use App\Http\Requests\Reactions\ReactionRequest;
use App\Models\Article;
use Illuminate\Support\Collection;

final class ReactionRepository
{
    public function getArticleReaction(int $reactionId): Collection
    {
        $article = Article::find($reactionId);
        return $article->reactions;
    }
}
